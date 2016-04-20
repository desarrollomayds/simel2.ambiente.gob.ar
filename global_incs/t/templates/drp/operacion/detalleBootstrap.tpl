<!DOCTYPE html>
<html>
<head>

    {include file='general/meta.tpl'}

    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    {include file='general/css_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
    <!-- carga de js y files especificos para la seccion -->
    {include file='general/js_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
</head>

<body style="padding-top:60px;">
    {include file='drp/operacion/menuBootstrap.tpl'}
    <div class="container">
        <div class="main">
            <ol class="breadcrumb">
                <li><a href="#">Registraciones Pendientes</a></li>
                <li><a href="listadoBootstrap.php">Lista</a></li>
                <li class="active">Informaci&oacute;n</li>
            </ol>
            <input id="rol_id" type="hidden" value="{$ROL_ID}">
            <div class="row">
                <div class="col-xs-12">
                    <div id="registro-cuerpo">
                        <div class="row">
                            <div class="col-xs-12 text-right" style="margin-bottom:10px">
                                <a href="listadoBootstrap.php" class="btn btn-info">Volver al listado</a>
                            </div>
                                <div class="col-md-8">
                                    <h2>INFORMACI&Oacute;N</h2>
                                </div>
                                <div class="col-md-4 text-right">
                                    <button type="button" class="btn btn-success validar"><i class="fa fa-check"></i> Validar</button>
                                    <button type="button" class="btn btn-info descargar"><i class="fa fa-download"></i> Descargar</button>
                                    <button type="button" class="btn btn-warning rechazar"><i class="fa fa-times"></i> Rechazar</button>
                                </div>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Datos" aria-controls="Datos" role="tab" data-toggle="tab">Datos de la empresa</a></li>
                            <li role="presentation"><a href="#Establecimiento" aria-controls="Establecimiento" role="tab" data-toggle="tab" id="linkEst">Establecimiento</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="bs-example tab-pane tabUnique active" id="Datos">
                                <div class="bs-example">
                                    <p>
                                        <strong>Cuit: </strong>{$EMPRESA.CUIT}
                                        <br>
                                        <strong>Roles: </strong>
                                        {if $EMPRESA.ROLES.GENERADOR} Generador {/if} {if $EMPRESA.ROLES.TRANSPORTISTA} Transportista {/if} {if $EMPRESA.ROLES.OPERADOR} Operador {/if}
                                        <br>
                                        <strong>Nombre: </strong>{$EMPRESA.NOMBRE}
                                        <br>
                                        <strong>Fec. Ini. Act: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/fecinact" data-id="{$EMPRESA.FECHA_INICIO_ACT }" class="editableFeld">{$EMPRESA.FECHA_INICIO_ACT}</span>
                                        <br>
                                        <strong>N&uacute;mero Telef&oacute;nico: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/telef" data-id="{$EMPRESA.NUMERO_TELEFONICO }" class="editableFeld">{$EMPRESA.NUMERO_TELEFONICO}</span>
                                    </p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>Domicilio real</strong>
                                            <br>
                                            <br>
                                            <strong>Calle: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrecalle" data-id="{$EMPRESA.CALLE_R}" class="editableFeld">{$EMPRESA.CALLE_R}</span>&nbsp;
                                            <br>
                                            <strong>N&uacute;mero: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrenum" data-id="{$EMPRESA.NUMERO_R}" class="editableFeld">{$EMPRESA.NUMERO_R}</span>&nbsp;
                                            <strong>Piso: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrepiso" data-id="{$EMPRESA.PISO_R}" class="editableFeld">{$EMPRESA.PISO_R}</span>&nbsp;
                                            <strong>Oficina: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrreofi" data-id="{$EMPRESA.OFICINA_R}" class="editableFeld">{$EMPRESA.OFICINA_R}</span>&nbsp;
                                            <br>
                                            <strong>Provincia: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr1" data-name="Emp/pro1" data-id="{$EMPRESA.PROVINCIA_R_ID}" class="editableFeld">{$EMPRESA.PROVINCIA_R_}</span>
                                            <script>var arr1 = {$EMPRESA.PROVINCIA_ARR};</script>
                                            <br>
                                            <strong>Localidad: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr2" data-name="Emp/loca1" data-id="{$EMPRESA.LOCALIDAD_R_ID}" class="editableFeld">{$EMPRESA.LOCALIDAD_R_}</span>
                                            <script>var arr2 = {$EMPRESA.LOCALIDAD_ARR};</script>
                                            <br>
                                            <strong>C. Postal: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrrecp" data-id="{$EMPRESA.CODIGO_POSTAL}" class="editableFeld">{$EMPRESA.CODIGO_POSTAL}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Domicilio legal</strong>
                                            <br>
                                            <br>
                                            <strong>Calle: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlecalle" data-id="{$EMPRESA.CALLE_L}" class="editableFeld">{$EMPRESA.CALLE_L}</span>&nbsp;
                                            <br>
                                            <strong>N&uacute;mero: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlenum" data-id="{$EMPRESA.NUMERO_L}" class="editableFeld">{$EMPRESA.NUMERO_L}</span>&nbsp;
                                            <strong>Piso: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlepiso" data-id="{$EMPRESA.PISO_L}" class="editableFeld">{$EMPRESA.PISO_L}</span>&nbsp;
                                            <strong>Oficina: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrleofi" data-id="{$EMPRESA.OFICINA_L}" class="editableFeld">{$EMPRESA.OFICINA_L}</span>&nbsp;
                                            <br>
                                            <strong>Provincia: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr3" data-name="Emp/pro2" data-id="{$EMPRESA.PROVINCIA_L_ID}" class="editableFeld">{$EMPRESA.PROVINCIA_L_}</span>
                                            <script>var arr3 = {$EMPRESA.PROVINCIA_L_ARR};</script>
                                            <br>
                                            <strong>Localidad: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr4" data-name="Emp/loca2" data-id="{$EMPRESA.LOCALIDAD_L_ID}" class="editableFeld">{$EMPRESA.LOCALIDAD_L_}</span>
                                            <script>var arr4 = {$EMPRESA.LOCALIDAD_L_ARR};</script>
                                            <br>
                                            <strong>C. Postal: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrlecp" data-id="{$EMPRESA.CODIGO_POSTAL_L}" class="editableFeld">{$EMPRESA.CODIGO_POSTAL_L}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Domicilio constituido</strong>
                                            <br>
                                            <br>
                                            <strong>Calle: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcocalle" data-id="{$EMPRESA.CALLE_C}" class="editableFeld">{$EMPRESA.CALLE_C}</span>&nbsp;
                                            <br>
                                            <strong>N&uacute;mero: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrconum" data-id="{$EMPRESA.NUMERO_C}" class="editableFeld">{$EMPRESA.NUMERO_C}</span>&nbsp;
                                            <strong>Piso: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcopiso" data-id="{$EMPRESA.PISO_C}" class="editableFeld">{$EMPRESA.PISO_C}</span>&nbsp;
                                            <strong>Oficina: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcoofi" data-id="{$EMPRESA.OFICINA_C}" class="editableFeld">{$EMPRESA.OFICINA_C}</span>&nbsp;
                                            <br>
                                            <strong>Provincia: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr5" data-name="Emp/pro3" data-id="{$EMPRESA.PROVINCIA_C_ID}" class="editableFeld">{$EMPRESA.PROVINCIA_C_}</span>
                                            <script>var arr5 = {$EMPRESA.PROVINCIA_C_ARR};</script>
                                            <br>
                                            <strong>Localidad: </strong><span data-pk="{$EMPRESA.ID}" data-array="1" data-values="arr6" data-name="Emp/loca3" data-id="{$EMPRESA.LOCALIDAD_C_ID}" class="editableFeld">{$EMPRESA.LOCALIDAD_C_}</span>
                                            <script>var arr6 = {$EMPRESA.LOCALIDAD_C_ARR};</script>
                                            <br>
                                            <strong>C. Postal: </strong><span data-pk="{$EMPRESA.ID}" data-name="Emp/domrcocp" data-id="{$EMPRESA.CODIGO_POSTAL_C}" class="editableFeld">{$EMPRESA.CODIGO_POSTAL_C}</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <p class="registro-titulo bg-info">Representante Legal</p>
                                {foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
                                <div class="bs-example">
                                    <p>
                                        <strong>Nombre: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/nom" data-id="{$REPRESENTANTE.NOMBRE}" class="editableFeld">{$REPRESENTANTE.NOMBRE}</span>
                                        <br>
                                        <strong>Apellido: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/ape" data-id="{$REPRESENTANTE.APELLIDO}" class="editableFeld">{$REPRESENTANTE.APELLIDO}</span>
                                        <br>
                                        <strong>Fecha de nacimiento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/fn" data-id="{$REPRESENTANTE.FECHA_NACIMIENTO}" class="editableFeld">{$REPRESENTANTE.FECHA_NACIMIENTO}</span>
                                        <br>
                                        <strong>Tipo de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-array="1" data-values="tdni1" data-name="RL/tdni" data-id="{$REPRESENTANTE.TIPO_DOCUMENTO_ID}" class="editableFeld">{$REPRESENTANTE.TIPO_DOCUMENTO_}</span>
                                        <script>var tdni1 = {$REPRESENTANTE.TIPO_DOCUMENTO_ARR};</script>
                                        <br>
                                        <strong>N&uacute;mero de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/dni" data-id="{$REPRESENTANTE.NUMERO_DOCUMENTO}" class="editableFeld">{$REPRESENTANTE.NUMERO_DOCUMENTO}</span>
                                        <br>
                                        <strong>Cuit: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RL/cuit" data-id="{$REPRESENTANTE.CUIT}" class="editableFeld">{$REPRESENTANTE.CUIT}</span>
                                    </p>
                                </div>
                                <br> {/foreach}
                                <p class="registro-titulo bg-info">Representante T&eacute;cnico</p>
                                {foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
                                <div class="bs-example">
                                    <p>
                                        <strong>Nombre: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/nom" data-id="{$REPRESENTANTE.NOMBRE}" class="editableFeld">{$REPRESENTANTE.NOMBRE}</span>
                                        <br>
                                        <strong>Apellido: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/ape" data-id="{$REPRESENTANTE.APELLIDO}" class="editableFeld">{$REPRESENTANTE.APELLIDO}</span>
                                        <br>
                                        <strong>Fecha de nacimiento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/fn" data-id="{$REPRESENTANTE.FECHA_NACIMIENTO}" class="editableFeld">{$REPRESENTANTE.FECHA_NACIMIENTO}</span>
                                        <br>
                                        <strong>Tipo de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-array="1" data-values="tdni2" data-name="RT/tdni" data-id="{$REPRESENTANTE.TIPO_DOCUMENTO_ID}" class="editableFeld">{$REPRESENTANTE.TIPO_DOCUMENTO_}</span>
                                        <script>var tdni2 = {$REPRESENTANTE.TIPO_DOCUMENTO_ARR};</script>
                                        <br>
                                        <strong>N&uacute;mero de documento: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/dni" data-id="{$REPRESENTANTE.NUMERO_DOCUMENTO}" class="editableFeld">{$REPRESENTANTE.NUMERO_DOCUMENTO}</span>
                                        <br>
                                        <strong>Cargo: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/cargo" data-id="{$REPRESENTANTE.CARGO}" class="editableFeld">{$REPRESENTANTE.CARGO}</span>
                                        <br>
                                        <strong>Cuit: </strong><span data-pk="{$REPRESENTANTE.ID}" data-name="RT/cuit" data-id="{$REPRESENTANTE.CUIT}" class="editableFeld">{$REPRESENTANTE.CUIT}
                                    </p>
                                </div>
                                <br> {/foreach}
                            </div>
                            <div role="tabpanel" class="bs-example tab-pane tabUnique" id="Establecimiento">
                                <ul class="nav nav-tabs js-mupe">
                                {foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
                                    <li><a  href="#subt_{$ESTABLECIMIENTO.ID}" role="tab" data-toggle="tab">{$ESTABLECIMIENTO.NOMBRE}</a></li>
                                {/foreach}
                                </ul>
                                <div class="tab-content">
                                    {foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
                                    <div role="tabpanel" class="bs-example tab-pane tabUnique" id="subt_{$ESTABLECIMIENTO.ID}">
                                        <p>
                                            <strong>Nombre: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/nomb" data-id="{$ESTABLECIMIENTO.NOMBRE}" class="editableFeld">{$ESTABLECIMIENTO.NOMBRE}</span>
                                            <br>
                                            <strong>Tipo: </strong>{$ESTABLECIMIENTO.TIPO_}
                                            <br>
                                            <strong>Usuario: </strong>{$ESTABLECIMIENTO.USUARIO}
                                            <h3 class="bg-warning">
                                                <strong>CAA: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/caanu" data-id="{$ESTABLECIMIENTO.CAA_NUMERO}" class="editableFeld">{$ESTABLECIMIENTO.CAA_NUMERO}</span>
                                                <strong>Vencimiento: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/caaven" data-id="{$ESTABLECIMIENTO.CAA_VENCIMIENTO}" class="editableFeld">{$ESTABLECIMIENTO.CAA_VENCIMIENTO}</span>
                                             </h3>
                                        </p>
                                        <h3 class="bg-warning">
                                            <strong>Expediente: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/exnu" data-id="{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}" class="editableFeld">{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}</span>
                                            <strong>A&ntilde;o: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/exanio" data-id="{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}" class="editableFeld">{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}</span>
                                        </h3>
                                        <strong>Actividad: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-type="textarea" data-name="Est/act" data-id="{$ESTABLECIMIENTO.ACTIVIDAD_}" class="editableFeld">{$ESTABLECIMIENTO.ACTIVIDAD_}</span>
                                        <br>
                                        <strong>Descripci&oacute;n: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-type="textarea" data-name="Est/desc" data-id="{$ESTABLECIMIENTO.DESCRIPCION}" class="editableFeld">{$ESTABLECIMIENTO.DESCRIPCION}</span>
                                        <br>
                                        <strong>Direcci&oacute;n Email: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/email" data-id="{$ESTABLECIMIENTO.EMAIL}" class="editableFeld">{$ESTABLECIMIENTO.EMAIL}</span>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Domicilio real</strong>
                                                <br>
                                                <br>
                                                <strong>Calle: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/recalle" data-id="{$ESTABLECIMIENTO.CALLE_R}" class="editableFeld">{$ESTABLECIMIENTO.CALLE_R}</span>
                                                <br>
                                                <strong>N&uacute;mero: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/renum" data-id="{$ESTABLECIMIENTO.NUMERO_R}" class="editableFeld">{$ESTABLECIMIENTO.NUMERO_R}</span>
                                                <strong>Piso: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/repiso" data-id="{$ESTABLECIMIENTO.PISO_R}" class="editableFeld">{$ESTABLECIMIENTO.PISO_R}</span>
                                                <br>
                                                <strong>Provincia: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-array="1" data-values="reprov{$ESTABLECIMIENTO.ID}" data-name="Est/reprov" data-id="{$ESTABLECIMIENTO.PROVINCIA_R_ID}" class="editableFeld">{$ESTABLECIMIENTO.PROVINCIA_R_}</span>
                                                <script>var reprov{$ESTABLECIMIENTO.ID} = {$ESTABLECIMIENTO.PROVINCIA_ARR};</script>
                                                <br>
                                                <strong>Localidad: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-array="1" data-values="reloc{$ESTABLECIMIENTO.ID}" data-name="Est/reloca1" data-id="{$ESTABLECIMIENTO.LOCALIDAD_R_ID}" class="editableFeld">{$ESTABLECIMIENTO.LOCALIDAD_R_}</span>
                                                <script>var reloc{$ESTABLECIMIENTO.ID} = {$ESTABLECIMIENTO.LOCALIDAD_ARR};</script>
                                                <br>
                                                <strong>C. Postal: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/recp" data-id="{$ESTABLECIMIENTO.CODIO_POSTAL}" class="editableFeld">{$ESTABLECIMIENTO.CODIO_POSTAL}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Domicilio constituido</strong>
                                                <br>
                                                <br>
                                                <strong>Calle: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/cacalle" data-id="{$ESTABLECIMIENTO.CALLE_C}" class="editableFeld">{$ESTABLECIMIENTO.CALLE_C}</span>
                                                <br>
                                                <strong>N&uacute;mero: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/canum" data-id="{$ESTABLECIMIENTO.NUMERO_C}" class="editableFeld">{$ESTABLECIMIENTO.NUMERO_C}</span>
                                                <strong>Piso: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/capiso" data-id="{$ESTABLECIMIENTO.PISO_C}" class="editableFeld">{$ESTABLECIMIENTO.PISO_C}</span>
                                                <br>
                                                <strong>Provincia: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-array="1" data-values="caprov{$ESTABLECIMIENTO.ID}" data-name="Est/caprov" data-id="{$ESTABLECIMIENTO.PROVINCIA_C_ID}" class="editableFeld">{$ESTABLECIMIENTO.PROVINCIA_C_}</span>
                                                <script>var caprov{$ESTABLECIMIENTO.ID} = {$ESTABLECIMIENTO.PROVINCIA_C_ARR};</script>
                                                <br>
                                                <strong>Localidad: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-array="1" data-values="caloc{$ESTABLECIMIENTO.ID}" data-name="Est/caloca1" data-id="{$ESTABLECIMIENTO.LOCALIDAD_C_ID}" class="editableFeld">{$ESTABLECIMIENTO.LOCALIDAD_C_}</span>
                                                <script>var caloc{$ESTABLECIMIENTO.ID} = {$ESTABLECIMIENTO.LOCALIDAD_C_ARR};</script>
                                                <br>
                                                <strong>C. Postal: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/cacp" data-id="{$ESTABLECIMIENTO.CODIO_POSTAL_C}" class="editableFeld">{$ESTABLECIMIENTO.CODIO_POSTAL_C}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Nomenclatura Catastral: </strong>
                                                <span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/catacir" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC}</span> -
                                                <span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/catasec" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC}</span> -
                                                <span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/cataman" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ}</span> -
                                                <span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/catapar" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC}</span> -
                                                <span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/catasup" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <br>
                                                <strong>Habilitaciones: </strong><span data-pk="{$ESTABLECIMIENTO.ID}" data-name="Est/nocasub" data-id="{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUBPARC}" class="editableFeld">{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUBPARC}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <br>
                                        <p class="registro-titulo bg-info">Permisos</p>
                                        {foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
                                        <div class="bs-example">
                                            <p>
                                                <strong>Establecimiento: </strong>{$ESTABLECIMIENTO.NOMBRE}
                                                <br>
                                                <strong>C&oacute;digo: </strong><span id="callbPerm">{$PERMISO.RESIDUO}</span>
                                                <br>
                                                <strong>Residuo: </strong><span data-pk="{$PERMISO.ID}" data-array="1" data-values="perres{$ESTABLECIMIENTO.ID}{$PERMISO.ID}" data-callb="callbPerm" data-name="Per/res_" data-id="{$PERMISO.RESIDUO}" class="editableFeld">{$PERMISO.RESIDUO_}</span>
                                                <script>var perres{$ESTABLECIMIENTO.ID}{$PERMISO.ID} = {$PERMISO.RESIDUO_ARR};</script>
                                                <br> {if $ESTABLECIMIENTO.TIPO == 1}
                                                <strong>Cantidad: </strong><span data-pk="{$PERMISO.ID}" data-name="Per/cant" data-id="{$PERMISO.CANTIDAD}" class="editableFeld">{$PERMISO.CANTIDAD}</span>
                                                <br> {/if} {if $ESTABLECIMIENTO.TIPO == 3}
                                                <strong>Permisos de eliminaci&oacute;n de residuos: </strong>
                                                <ul>
                                                    {foreach $PERMISO.ELIMINACION as $ELIMINACION}
                                                    <li>{$PERMISO.ELIMINACION_[$ELIMINACION]}</li>
                                                    {/foreach}
                                                </ul>
                                                {/if}
                                            </p>
                                        </div>{/foreach}
                                        {if $ESTABLECIMIENTO.TIPO == 2}
                                            <p class="registro-titulo bg-info">Veh&iacute;culos</p>
                                            {foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
                                            <div class="bs-example">
                                                <p>
                                                    <strong>Establecimiento : </strong>{$ESTABLECIMIENTO.NOMBRE}
                                                    <br>
                                                    <strong>Dominio: </strong><span data-pk="{$VEHICULO.ID}" data-name="Veh/dom" data-id="{$VEHICULO.DOMINIO}" class="editableFeld">{$VEHICULO.DOMINIO}</span>
                                                    <br>
                                                    <strong>Descripci&oacute;n : </strong><span data-pk="{$VEHICULO.ID}" data-name="Veh/desc" data-type="textarea" data-id="{$VEHICULO.DESCRIPCION}" class="editableFeld">{$VEHICULO.DESCRIPCION}</span>
                                                </p>


                                                <p class="registro-titulo bg-warning">
                                                    Permisos del Veh&iacute;culo <span id="vh2_{$VEHICULO.ID}">{$VEHICULO.DOMINIO}</span>
                                                </p>
                                                {foreach $VEHICULO.PERMISOS as $PERMISO}
                                                <div class="bs-example">
                                                    <p>
                                                        <strong>C&oacute;digo: </strong><span id="callbPerm">{$PERMISO.RESIDUO}</span>
                                                        <br>
                                                        <strong>Residuo: </strong><span data-pk="{$PERMISO.ID}" data-array="1" data-callb="callbPerm" data-values="veperres{$ESTABLECIMIENTO.ID}{$VEHICULO.ID}{$PERMISO.ID}" data-name="VePer/res_" data-id="{$PERMISO.RESIDUO}" class="editableFeld">{$PERMISO.RESIDUO_}</span>
                                                        <script>var veperres{$ESTABLECIMIENTO.ID}{$VEHICULO.ID}{$PERMISO.ID} = {$PERMISO.RESIDUO_ARR};</script>
                                                        <br>
                                                        <strong>Cantidad: </strong><span data-pk="{$PERMISO.ID}" data-name="VePer/can" data-id="{$PERMISO.CANTIDAD}" class="editableFeld">{$PERMISO.CANTIDAD}</span>
                                                        <br>
                                                        <strong>Estado: </strong><span data-pk="{$PERMISO.ID}" data-array="1" data-values="veperest{$ESTABLECIMIENTO.ID}{$VEHICULO.ID}{$PERMISO.ID}" data-name="VePer/est" data-id="{$PERMISO.ESTADO_ID}" class="editableFeld">{$PERMISO.ESTADO_}</span>
                                                        <script>var veperest{$ESTABLECIMIENTO.ID}{$VEHICULO.ID}{$PERMISO.ID} = {$PERMISO.ESTADO_ARR};</script>
                                                    </p>
                                                </div> {/foreach}
                                            </div> {/foreach}
                                        {/if}

                                    </div>
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-success validar"><i class="fa fa-check"></i> Validar</button>
                            <button type="button" class="btn btn-info descargar"><i class="fa fa-download"></i></i> Descargar</button>
                            <button type="button" class="btn btn-warning rechazar"><i class="fa fa-times"></i> Rechazar</button>
                        </div>
                    </div>
                </div>
            </div>

            {include file='general/logosBootstrap.tpl' }
        </div>
</body>
<script>
    var multMenu=false;
    $( document ).ready(function() {
        $(".validar").click(function() {
            window.location="aceptar.php?id={$EMPRESA.ID}";
        });

          $(".descargar").click(function() {
            window.open("descargar.php?id={$EMPRESA.ID}");
        });

        $(".rechazar").click(function() {
            window.location="rechazar.php?id={$EMPRESA.ID}";
        });

        $(".js-mupe").find("li").first().addClass("active");
        $("#Establecimiento .tab-content").find(".tab-pane").first().addClass("active");
        $('#linkEst').click(function (e) {
            if(!multMenu) {
                $(".js-mupe").find("li").first().find("a").click();
                multMenu = true;
                $('.js-mupe').bootstrapResponsiveTabs();
                $(".js-mupe").find("li").first().find("a").click();
            }
        });

        $('.editableFeld').each(function() {
            var opts = Array();
            if($(this).data('array')=="1") {
                opts.source = window[$(this).attr('data-values')];
                opts.type = 'select';
                opts.value = $(this).attr('data-id');
            }

            if($(this).attr('data-type')=="textarea") {
                opts.type = 'textarea';
            }
            opts.pk = $(this).attr('data-pk');
            opts.name = $(this).attr('data-name');
            opts.url = 'editField.php';
            opts.emptytext = '';
            opts.success = function(response, newValue) {
                if($(this).data('name')=="Veh/dom") {
                    $('#vh2_'+$(this).data('pk')).html(newValue);
                }
                if($(this).data('callb')!=undefined && $(this).data('callb')!="") {
                    $(this).parent().parent().find('#callbPerm').html(newValue);
                }

            };
            $(this).editable(opts);
        });
    })
</script>
</html>
