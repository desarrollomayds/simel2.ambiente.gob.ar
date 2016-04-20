<?

class DocumentoManifiesto extends ActiveRecord\Model
{
	static $table_name = 'documentos_manifiestos';

	// de la mano con la tabla tipo_documentos_manifiestos
	const CONSTANCIA_RECEPCION = 1;
	const CERTIFICADO_TRATAMIENTO = 2;
	const MANIFIESTO = 3;
	const ANEXO_TRANSPORTISTA = 4;
}

?>
