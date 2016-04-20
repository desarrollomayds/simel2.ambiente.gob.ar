<?
class EstablecimientoFavorito extends ActiveRecord\Model
{
	static $table_name = 'establecimientos_favoritos';
	static $belongs_to = array(array('establecimiento'));
}
?>