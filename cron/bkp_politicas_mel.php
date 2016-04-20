<?
//***************************** VARIABLES ******************************//
$ar_fecha  = explode("/",date("i/H/d/m/Y"));
//**********************************************************************//

//****************************** INCLUDES ******************************//
require_once($DOCUMENT_ROOT."/global_incs/configuracion/configuracion.php");
require_once($DOCUMENT_ROOT."/global_incs/librerias/local.inc.php");
//**********************************************************************//

$conexion = new Politica;
// cambiar el 1 por esto $ar_fecha[0]
$query = "SELECT * FROM politicas WHERE polEstado='A' AND ".
      "((polMin='10') OR ISNULL(polMin)) AND ((polHor=$ar_fecha[1]) OR ISNULL(polHor)) AND ".
      "((polDia=$ar_fecha[2]) OR ISNULL(polDia)) AND ((polMes=$ar_fecha[3]) OR ISNULL(polMes)) AND ".
      "((polAno='$ar_fecha[4]') OR ISNULL(polAno))";

$politica = Politica::find_by_sql($query);

//echo Politica::connection()->last_query;die;
//var_dump($politica);
foreach ($politica as $key => $value)
{
  switch($value->poltipo)
  {
    case 'CODEXE':

    $polsql = explode("::", $value->polsql);

    $exe = new politicas_exe();

    if (method_exists($exe, $polsql[1]))
    {
      echo $exe->$polsql[1]();
    }
    else
    {
      exit("No se pudo encontrar el método a ejecutar");
    }

    break;
  }
}
die;





$res_ENV = $conn->execute($SQL_ENV);

for($idx_file=0;!$res_ENV->eof;$res_ENV->MoveNext()) {
  switch($res_ENV->field(polTipo)) {
    case 'CON':
      $res = $conn->execute($res_ENV->field(polSQL));
      break;

    case 'CONEXE':
      $res = $conn->execute($res_ENV->field(polSQL));
      for(;!$res->eof;$res->MoveNext()) $_r = $conn->execute($res->field(C));
      break;

    case 'CODEXE':
      $funciones = explode("|", $res_ENV->field("polSQL"));
      for ($i=1, $parametros=array(); $i<count($funciones); $i++)
        $parametros[] = $funciones[$i];

      $inclusiones = explode(";", $res_ENV->field("polFile"));
      foreach ( $inclusiones as $inc ){
        if (!file_exists($inc)) { echo "Error al incluir \"$inc\""; return false; }
        require_once($inc);
      }

      $ret = (is_array($parametros))? call_user_func_array($funciones[0], $parametros): call_user_func($funciones[0]);

      if (is_array($ret) && $ret[0] != 1) echo $ret[1];
      break;

    default:
      $res_SQL = $conn->execute($res_ENV->field(polSQL));
      $ar_file[$idx_file] = fopen($res_ENV->field(polFile), "r");
      for($archivo=''; !feof($ar_file[$idx_file]); $archivo.=fread($ar_file[$idx_file], 1024));

      for(;!$res_SQL->eof;) {
        for($i=0;$i<$params["ENV_agrupacionMails"] && !$res_SQL->eof;$i++,$res_SQL->MoveNext()) {
          $mail = new PHPMailer();

        	$mail->Username   = $res_ENV->field(polSender);
        	$mail->Password   = $params["SMTP_PASS"];
        	$mail->Port       = 587;
        	$mail->SMTPAuth   = true;
        	$mail->SMTPSecure = 'tls';

          $mail->Host = $params["SMTP_SERVER"];
          $mail->From = $res_ENV->field(polSender);
          $mail->FromName = $res_ENV->field(polSender);
          $mail->Subject = $res_ENV->field(polNombre);
          $mail->isHtml(true);
          $mail->AddAddress($res_SQL->field(MAIL));

          switch($res_ENV->field(polTipo)) {
            case 'ENVM':
              include($res_ENV->field(polFile));
              $mail->Body = main();
              $mail->Send();
              break;

            case 'ENV':
              for($archivo_aux=$archivo, $j=0; $j<$res_SQL->numfields; $j++)
                $archivo_aux = str_replace("[VAL".$j."]", $res_SQL->field("C".($j+1)), $archivo_aux);
              $mail->Body = $archivo_aux;

              $mail->Send();
              break;
          }
        }
        if($params["ENV_intervaloTiempo"]) sleep($params["ENV_intervaloTiempo"]);
      }
      $idx_file++; break;
  }
}

for($i=$idx_file-1;$i>=0;$i--) fclose($ar_file[$i]);
?>