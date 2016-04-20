function cuitConFormatoValido(cuit)
{
  if (typeof (cuit) == 'undefined')
	return false;

  if (!validaPrefijoCuit(cuit.substr(0, 2)))
	return false;

  var medio_cuit = cuit.substr(2, 8);
  if (parseFloat(medio_cuit) == 0)
	return false;

  if (cuit.length != 11)
	return false;
  else {
	var mult = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];
	var total = 0;

	for (var i = 0; i < mult.length; i++){
	  total += parseInt(cuit.charAt(i)) * mult[i];
	}

	var mod = total % 11;
	var digito = mod == 0 ? 0 : mod == 1 ? 9 : 11 - mod;
  }
  return digito == parseFloat(cuit.charAt(10));
}

/**
 * Valida el prefijo del CUIT.
 *
 * @access public
 * @param string prefijo Comienzo del cuit a validar.
 *
 * @return void
 **/
function validaPrefijoCuit(prefijo){
  var pre = "20|23|24|27|30|33|34".split("|");
  for (i=0; i<pre.length; i++)
	if (parseFloat(prefijo) == pre[i])
	  return true;

  return false;
}