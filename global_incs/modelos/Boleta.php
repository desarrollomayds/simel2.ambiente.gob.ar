<?

require_once(__DIR__."/../librerias/mpdf/mpdf.php");
require_once(__DIR__."/../classes/codigo_boleta.class.php");
require_once(__DIR__."/../classes/codigo_011.class.php");

class Boleta extends ActiveRecord\Model{

	static $table_name = 'boletas_pago';

	public function mostrar($id){
		$resultado = array();

		if ($id) {
		$query = Boleta::all(array('conditions' => array('establecimiento_id' => $id), 'order' => 'id desc'));

			if(empty($query)){
				$resultado['error'] = "No se han encontrado boletas para esa empresa";
			} else {

				foreach ($query as $value) {
					$fecha_pago ="";
					if (!empty($value->fecha_registracion)){
						$fecha_registracion = $value->fecha_registracion->format('d/m/Y');
					}
					if (!empty($value->fecha_pago)){
						$fecha_pago = $value->fecha_pago->format('d/m/Y');
					}

					$resultado[] = array(
					    "id" => $value->id,
					    "importe" => $value->importe,
					    "cantidad_manifiestos" => $value->cantidad_manifiestos,
					    "fecha_registracion" => $fecha_registracion,
					    "fecha_pago" => $fecha_pago,
					);
				}
			}
		}
		return $resultado;
	}

	public function crear($establecimiento_id, $cantidad, $importe_manifiesto, $importe){
		$resultado = array();
		if (isset($establecimiento_id)){
			$importe = number_format($importe, 2, '.', '');
			$fecha = date('Y-m-d H:i:s');
			$vence = strtotime ( '+7 day' , strtotime ( $fecha ) ) ;
			$vence = date ( 'Y-m-d H:i:s' , $vence );

			$atributos = array('establecimiento_id' => $establecimiento_id, 'fecha_registracion' => $fecha, 'cantidad_manifiestos' => $cantidad, 'importe_manifiesto' => $importe_manifiesto, 'importe' => $importe, 'fecha_vencimiento' => $vence);

			try {
	   			$boleta = Boleta::create($atributos);

				$datosBoleta = array(
				    "codBoleta" 		=> $boleta->id,
				    "codCliente" 		=> "0",
				    "codFecVen" 		=> $vence,
				    "codImporte" 		=> $importe,
				    "establecimiento_id"=> $boleta->establecimiento_id,
				    );

				$boletaPago = new codigo_boleta("011");
				$bopCB = $boletaPago->generar_codigo_boleta($datosBoleta);

				$boleta->cb = $bopCB;
				$boleta->save();

				$atributos['cb'] = $bopCB;

	   			$boleta->generarPdfBoleta($atributos);
	   			$resultado[] = $boleta;
			} catch (Exception $e) {
				$resultado['error'] = $e->getMessage();
			}
			return $resultado;
		}
	}

	public function verificar($array_csv){
		foreach ($array_csv as $value) {
			$campos = array('establecimiento_id' => $value[0], 'id' => $value[1]);
			$resultado[] = Boleta::find($campos);
		}
		return $resultado;
	}

	public function estado($id){
		$resultado[] = Boleta::find($id);

			if (!empty($resultado[0]->fecha_pago)){
				$resultado = "pagado";
			} else {
				$resultado = "pendiente";
			}
		return $resultado;
	}

	public function pagar($id, $resto = "", $fecha){
			$resultado = Boleta::find($id);
			$resultado->fecha_pago = $fecha;
			if ($resto){
				$resultado->resto = $resto;
			}
			$resultado->save();
		return $resultado;
	}

	public function generarPdfBoleta($atributos)
	{
		$fecha = $atributos['fecha_registracion'];
		$fecha_registracion = date("d-m-Y H:i:s", strtotime($fecha));
		$fecha_vencimiento = date("d-m-y", strtotime ( '+7 day', strtotime($fecha)));

		$smarty = inicializar_smarty();
		$smarty->assign('boleta_id', $this->id);
		$smarty->assign('boleta_unitario', $this->importe_manifiesto);
		$smarty->assign('cantidad_manifiestos', $this->cantidad_manifiestos);
		$smarty->assign('importe', $this->importe);
		$smarty->assign('fecha_registracion', $fecha_registracion);
		$smarty->assign('fecha_vencimiento', $fecha_vencimiento);
		$smarty->assign('cb', $atributos['cb']);
		$smarty->assign('nombre', $_SESSION['INFORMACION_GENERAL']['EMPRESA']['NOMBRE']);
		$smarty->assign('cuit', $_SESSION['INFORMACION_GENERAL']['EMPRESA']['CUIT']);
		$smarty->assign('id', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID']);
		$smarty->assign('razon', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['NOMBRE_EMPRESA']);


		$html = $smarty->fetch('operacion/compartido/imprimir_boleta.tpl');
		$mpdf = new mPDF();
		$mpdf->ignore_invalid_utf8 = true;
		$mpdf->WriteHTML($html);
		$filename = $this->getCompleteFilename();
		//var_dump($filename);die;
		//$mpdf->Output();
		$mpdf->Output($filename, 'F');
	}

	public function getCompleteFilename()
	{
		$path = $this->getDocumentPath();
		$filename = $this->id.'.pdf';
		return $path.$filename;
	}

	private function getDocumentPath()
	{
		$basepath = $this->getDocBasePath();
		$path = $basepath.'/'.$this->establecimiento_id.'/';
		// si el directorio para el id_est no existe, lo creamos.
		if ( ! file_exists($path) && ! is_dir($path)) {
			mkdir($path); // 0777 por default.
		}
		return $path;
	}

	private function getDocBasePath()
	{
		$c = new config();
		return $c->getParameters("framework::documentos::path_boletas");
	}

}