<?

class Ruta extends ActiveRecord\Model { 

	static $has_many = array(
								array('establecimientos_ruta', 'class_name' => 'EstablecimientoRuta'),
							);

/*
	static $belongs_to = array(
								array('person'),
								array('order')
							  );
*/

}

?>
