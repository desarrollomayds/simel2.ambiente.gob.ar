<p>Por medio del presente, el Ministerio de Ambiente y Desarrollo Sustentable de la Nación le informa que el manifiesto con ID DE OPERACIÓN <b>{$manifiesto->id}</b>, ha vencido automáticamente al haber alcanzado 5 días sin ser aprobado por todas sus partes.<p>

<p>Participantes del manifiesto</p>

<div>
	<b>Generadores:</b><br />
	<ul>
	{foreach $manifiesto->generadores_manifiesto as $g}
		<li>Nombre: {$g->nombre}</li>
		<li>Sucursal: {$g->sucursal}</li>
		<li>Estado: {if $g->estado == 'a'} <span style="color:green;font-weight:bold;">Aprobado</span> {else}<span style="color:red;font-weight:bold;">Pendiente</span> {/if}</li>
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
		<li>Estado: {if $t->estado == 'a'} <span style="color:green;font-weight:bold;">Aprobado</span> {else}<span style="color:red;font-weight:bold;">Pendiente</span> {/if}</li>
	{/foreach}
	</ul>
</div>

<div>
	<b>Operador:</b><br />
	<ul>
	{foreach $manifiesto->operadores_manifiesto as $o}
		<li>Nombre: {$o->nombre}</li>
		<li>Sucursal: {$o->sucursal}</li>
		<li>Estado: {if $p->estado == 'a'} <span style="color:green;font-weight:bold;">Aprobado</span> {else}<span style="color:red;font-weight:bold;">Pendiente</span> {/if}</li>
	{/foreach}
	</ul>
</div>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

{include file='mail/firma_mails.tpl'}