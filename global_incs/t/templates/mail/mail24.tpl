<p>Ha ocurrido un error en SIMEL en la seccion <b>{$params->seccion}.</b></p>

<h4>La descripción recibida del error fue</h4>
<pre>{$params->descripcion}<pre>

<h4>Datos Útiles acorde al contexto en cuestión (json sin decode):</h4>
<pre>{$params->extra_json_data}</pre>

{include file='mail/firma_mails.tpl'}