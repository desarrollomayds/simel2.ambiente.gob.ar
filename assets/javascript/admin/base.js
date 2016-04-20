/**
 * Base JS for admin module.
 */
$(document).ready(function() {

    $('#start_date').datepicker({
        format: 'dd/mm/yyyy',
        startView: 'decade',
        endDate: new Date()
    }).on('changeDate', function(e){
        $(this).datepicker('hide');
    });

    $('#end_date').datepicker({
        format: 'dd/mm/yyyy',
        startView: 'decade',
    }).on('changeDate', function(e){
        $(this).datepicker('hide');
    });

    $("#rango_estadisticas").change(function() {
        if ($(this).val() == 'custom') {
            $("input#start_date").show();
            $("input#start_date").attr('disabled', false);
            $("input#end_date").show();
            $("input#end_date").attr('disabled', false);
        } else {
            $("input#start_date").hide();
            $("input#start_date").attr('disabled', true);
            $("input#end_date").hide();
            $("input#end_date").attr('disabled', true);
        }
    });
});

function parseErrors(errors)
{
	$.each(errors, function(field, err_desc) {
		// add error class to elements
		$("input#"+field).addClass('error');
		$("div#"+field+"-error").addClass('error');
		// parse and show errors
		$("div#"+field+"-error").html(err_desc);
		$("div#"+field+"-error").show();
	});
}

function removeFieldErrors()
{
    $("input").on("click", function() {
    	$(this).removeClass('error');
    	var field = $(this).attr('id');
    	$("div#"+field+"-error").html('');
		$("div#"+field+"-error").hide();
    });

    $("select").on("change", function() {
    	$(this).removeClass('error');
    	var field = $(this).attr('id');
    	$("div#"+field+"-error").html('');
		$("div#"+field+"-error").hide();
    });

    $("textarea").on("click", function() {
    	$(this).removeClass('error');
    	var field = $(this).attr('id');
    	$("div#"+field+"-error").html('');
		$("div#"+field+"-error").hide();
    });
}

function actualizarEstadistica(objButton)
{
    var tipo_estadistica = objButton.attr('tipo-estadistica');

    if (typeof objButton.attr('chart-id') != "undefined") {
        var chart_ids = jQuery.parseJSON(objButton.attr('chart-id'));
    } else {
        var chart_ids = [];
    }

    var inputs = $("div#"+tipo_estadistica+" input");
    var selects = $("div#"+tipo_estadistica+" select");
    var params = {};
    
    inputs.each(function() {
        if ($(this).attr('name') != 'no_slop_json_graph_data' && 
            $(this).attr('name') != 'slop_json_graph_data' &&
            $(this).attr('name') != 'residuos_json_graph_data' &&
            $(this).attr('name') != 'tratamientos_json_graph_data')
        {
            params[$(this).attr('id')] = $(this).val();
        }
    });

    selects.each(function() {
        params[$(this).attr('id')] = $(this).val();
    });

    // escondemos boton aplicar y mostramos loader
   // objButton.hide();
    $("#"+tipo_estadistica+"_loading").show();

    $.ajax({
        type: "POST",
        url: admin_path+"/operacion/ajax/ajax_actualizar_"+tipo_estadistica+".php",
        data: {
            params: JSON.stringify(params)
        },
        dataType: "text json",
        success: function(rsp) {
            var table = $("table#tabla_"+tipo_estadistica);
            var row_string = '';

            // borramos rows anteriorios
            table.find("tr:gt(0)").remove();

            if (rsp.table_data.length)
            {
                $.each(rsp.table_data, function(key, obj) {
                    row_string += '<tr><td>'+ obj.csc + '</td><td>'+ obj.descripcion + '</td>';

                    if ('tratamiento' in obj) {
                        row_string += '<td>'+ obj.tratamiento + '</td>';
                    }

                    if ('enviado' in obj) {
                        row_string += '<td>'+ obj.enviado + '</td>';
                    }

                    if ('recibido' in obj) {
                        row_string += '<td>'+ obj.recibido + '</td>';
                    }

                    row_string += '<td>'+ $.number(obj.cantidad, 2, ',', '.' ) + 'kg</td>';

                    if ('cantidad_real' in obj) {
                        row_string += '<td>'+ $.number(obj.cantidad_real, 2, ',', '.' ) + 'kg</td>';
                    }

                    row_string += '</tr>';
                });
     
                table.append(row_string);
            }
            else
            {
                table.append('<tr><td>No se han encontrado resultados</td></tr>');
            }

            // graficos
            $.each(chart_ids, function(key, cid) {
                generateBarsChart(cid, rsp.charts_data[cid]);
            });

            // al terminar de parsear los datos volvemos botones a estado original
            $("#"+tipo_estadistica+"_loading").hide();
            objButton.show();
        }
    });
}

function generateBarsChart(chart_id, chart_data)
{
    if (chart_data !== undefined && chart_data["0"].values.length)
    {
        if (chart_data["0"].values.length <= 20)
        {
            $("#"+chart_id).show();
            $("div.chart_titles").show();

            nv.addGraph(function() {
               var chart = nv.models.discreteBarChart()
                .x(function(d) { return d.label })
                .y(function(d) { return d.value })
                .staggerLabels(true)
                .showValues(true);

                d3.select("#"+chart_id+" svg")
                    .datum(chart_data)
                    .transition().duration(500)
                    .call(chart);

                return chart;
            });
        }
        else
        {
            $("#"+chart_id).hide();
            $("div.chart_titles").hide();
            $("div#cant_show_chart_"+chart_id).show();
        }
    } else {
        $("#"+chart_id).hide();
        $("div.chart_titles").hide();
        $("div#cant_show_chart_"+chart_id).hide();
    }
}

function descargarEstadisticaCSV(obj)
{
    var tipo_estadistica = obj.attr('tipo-estadistica');

    var inputs = $("div#"+tipo_estadistica+" input");
    var selects = $("div#"+tipo_estadistica+" select");
    var params = {};
    
    inputs.each(function() {
        if ($(this).attr('name') != 'no_slop_json_graph_data' && 
            $(this).attr('name') != 'slop_json_graph_data' &&
            $(this).attr('name') != 'residuos_json_graph_data' &&
            $(this).attr('name') != 'tratamientos_json_graph_data')
        {
            params[$(this).attr('id')] = $(this).val();
        }
    });

    selects.each(function() {
        params[$(this).attr('id')] = $(this).val();
    });

    // preparamos url para redirect
    var url = admin_path+"/operacion/estadisticas_descargar_csv_"+tipo_estadistica+".php"
    var params = JSON.stringify(params);
    window.location.replace(url + '?params=' + params);
}
