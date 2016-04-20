<?php
class Alerta extends ActiveRecord\Model {
	static $belongs_to = array(
    	array('tipo_alertas', 'foreign_key' => 'id_tipo_alerta', 'class_name' => 'TipoAlerta')
   		);
 	
    static $has_many = array(
    	array('alertas_secciones', 'foreign_key' => 'id_alerta', 'class_name' => 'AlertasSecciones')
    );
}
?>