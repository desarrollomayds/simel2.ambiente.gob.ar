<p>Por medio del presente, el Ministerio de Ambiente y Desarrollo Sustentable de la Nación le informa que el manifiesto con número de protocolo <b>{formatear_id_protocolo_manifiesto($manifiesto->id_protocolo_manifiesto)}</b>, aún no ha declarado la recepción de los RP correspondientes.
Le sugerimos ponerse en contacto a fin de confirmar la efectiva recepción de los mismos y recordarle que debe informar tal recepción.
.<p>

<p>Participantes del manifiesto</p>

<div>
	<b>Generadores:</b><br />
	<ul>
	{foreach $manifiesto->generadores_manifiesto as $g}
		<li>Nombre: {$g->nombre}</li>
		<li>Sucursal: {$g->sucursal}</li>
		<br />
	{/foreach}
	</ul>
</div>

<div>
	<b>Transportista:</b><br />
	<ul>
	{foreach $manifiesto->transportistas_manifiesto as $t}
		<li>Nombre: {$t->nombre}</li>
		<li>Sucursal: {$t->sucursal}</li>
	{/foreach}
	</ul>
</div>

<div>
	<b>Operador:</b><br />
	<ul>
	{foreach $manifiesto->operadores_manifiesto as $o}
		<li>Nombre: {$o->nombre}</li>
		<li>Sucursal: {$o->sucursal}</li>
	{/foreach}
	</ul>
</div>

<p>Ante cualquier inconveniente o eventualidad, le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

{include file='mail/firma_mails.tpl'}