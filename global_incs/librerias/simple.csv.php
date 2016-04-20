<?php
	if( !defined('SIMPLE_CSV_PHP' ) ){
		define('SIMPLE_CSV_PHP' ,true);



		function printAsCSV($data, $delimiter = ';', $enclosure = '"', $escape='\\'){
			if(!is_null($data)){
				foreach ( $data as &$current){
					switch( gettype($current) ){
						case gettype(NULL)://TIPO VACIO
							$current = $enclosure.$enclosure;
						break;
						case gettype(true)://TIPO BOOLEANO
							sprintf( '%s%s%s', $enclosure, $current === true ?  'SI':'NO' , $enclosure);
						break;
						case gettype(1)://TIPO ENTERO
						break;
						case gettype(1.5)://TIPO FLOTANTE
						break;
						case gettype("asdfasdf")://TIPO STRING
							$current = str_replace($enclosure,$escape.$enclosure,$current); 
							$current = $enclosure . $current . $enclosure;
						break;
						default:
					}
				}
				return implode ( $delimiter , $data);
			}
			return NULL;
		}
	}

?>
