<?php

// La secuencia básica para trabajar con LDAP es conectar, autentificarse,
// buscar, interpretar el resultado de la búsqueda y cerrar la conexión.

echo "<h3>Prueba de consulta LDAP</h3>";
echo "Conectando ...";
$ds=ldap_connect("LDAP://192.168.0.1")
	or die("No ha sido posible conectarse al servidor");  // Debe ser un servidor LDAP valido!
echo "El resultado de la conexion es ".$ds."<br />";
if ($ds) {
	//ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
    echo "Autentificandose  ...";
    $r=ldap_bind($ds);     // Autentificacion anonima, habitual de los
                           // accesos de solo lectura
	echo "El resultado de la autentificacion es ".$r."<br />";

    echo "Buscando (CN=*) ...";
    // Busqueda de entradas por apellidos
    //$sr=ldap_search($ds,"o=*, c=a*", "sn=p*");
	$sr=ldap_search($ds,"OU=Usuarios, DC=intranet, DC=com", "cn=*");
    echo "El resultado de la busqueda es ".$sr."<br />";
    echo "El numero de entradas devueltas es ".ldap_count_entries($ds,$sr)."<br />";
    echo "Recuperando entradas ...<p>";
    $info = ldap_get_entries($ds, $sr);
    echo "Se han encontrado ".$info["count"]." entradas:<p>";
    for ($i=0; $i<$info["count"]; $i++) {
        /*echo "dn es: ". $info[$i]["dn"] ."<br />";
        echo "La primera entrada cn es: ". $info[$i]["cn"][0] ."<br />";
        echo "La primera entrada email es: ". $info[$i]["mail"][0] ."<br /><hr />";*/
				echo "<pre>".print_r($info[$i],true)."</pre>";
    }
    echo "Cerrando conexion";
    ldap_close($ds);
} else {
    echo "<h4>No ha sido posible conectarse al servidor LDAP</h4>";
}

?>
<HR><HR>
