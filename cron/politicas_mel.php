<?
//***************************** VARIABLES ******************************//
$ar_fecha  = explode("/",date("i/H/d/m/Y"));
//**********************************************************************//

//****************************** INCLUDES ******************************//
require_once("../global_incs/configuracion/configuracion.php");
require_once("../global_incs/librerias/local.inc.php");
//**********************************************************************//

$conexion = new Politica;
$query = "SELECT * FROM politicas WHERE polEstado='A'";

$politica = Politica::find_by_sql($query);

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

?>