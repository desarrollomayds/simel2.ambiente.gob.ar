<?
class Provincia extends ActiveRecord\Model
{
	static $table_name = 'cat_provincias';

	public function get_all()
	{
		return Provincia::find('all', array('conditions' => array('flag = ?', 't'), 'order' => 'descripcion asc'));
	}


}
?>
