<?php
/**
 * Cookie manager para el registro.
 */
class cookie extends mel
{
    public function exists($name)
    {
        return isset($_COOKIE[$name]);
    }

    public function get($name)
    {
        if ($this->exists($name)) {
            $json_obj = json_decode(stripslashes($_COOKIE[$name]));
            return $this->stdclass_to_array($json_obj);
        } else {
            return false;
        }
    }

    private function stdclass_to_array($obj)
    {
        if (is_object($obj)) {
            $obj = get_object_vars($obj);
        }

        if (is_array($obj)) {
            return array_map(__METHOD__, $obj);
        }
        else {
            return $obj;
        }
    }
}

?>

