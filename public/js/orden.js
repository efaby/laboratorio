 var iteration = 1;
$(document).ready(function() {
    var table = $('#productos').DataTable({
                    "info": false,
                    "lengthChange": false,
                    "dom": 'lrtip'
                });
	$("#cedula_paciente").autocomplete({
		source : url1,
		minLength: 5,
		select: function(event, ui) {
			event.preventDefault();
			$('#id_cliente').val(ui.item.id);
			$('#nombre_paciente').val(ui.item.value);
			$('#telefono_paciente').val(ui.item.telefono);
			$('#celular_paciente').val(ui.item.celular);
			$('#direccion_paciente').val(ui.item.direccion);
			$('#fecha_nacimiento').val(ui.item.fecha_nacimiento);
            $("#cedula_paciente").val(ui.item.cedula);                
		 }
	});

	$('#addDetalle').on( 'click', function () {
		var tbl = document.getElementById('examenes');
	    var lastRow = tbl.rows.length;

        if(lastRow == 2){
            $(".btnDel").removeClass("disabled");            
        }

	    iteration = iteration + 1;
	    var row = tbl.insertRow(lastRow);
	    
	    var cellLeft = row.insertCell(0);
	    var el = document.createElement('input');
	    el.type = 'text';
	    el.id = 'examen' + iteration;
	    el.placeholder='Examen';
        cellLeft.appendChild(el);
        var h1 = document.createElement('input');
        h1.type = 'hidden';
        h1.id = 'ids' + iteration;
        h1.name = 'ids[]';
	    cellLeft.appendChild(h1);
        var h2 = document.createElement('input');
        h2.type = 'hidden';
        h2.id = 'precioh' + iteration;
        h2.name = 'precioh[]';
        
        cellLeft.appendChild(h2);
	    $("#examen"+iteration ).addClass("form-control input-sm");
        $("#precioh"+iteration ).addClass("precioh");
	    

	    var cellRight = row.insertCell(1);
	    var tipo = document.createElement('div');
	    tipo.id = 'tipo' + iteration;
	    cellRight.appendChild(tipo);
        $("#tipo"+iteration ).addClass("texto-span");


	    var cellThird = row.insertCell(2);
	    var muestra = document.createElement('div');
	    muestra.id = 'muestra' + iteration;
	    cellThird.appendChild(muestra);
	    $("#muestra"+iteration ).addClass("texto-span");

	    var cellFourth = row.insertCell(3);
	    var precio = document.createElement('div');
	    precio.type = 'text';
	    precio.id = 'precio' + iteration;
	    cellFourth.appendChild(precio);
	    $("#precio"+iteration ).addClass("texto-span");

	    var cellFifth = row.insertCell(4);
	    var eliminar = document.createElement('button');
	    eliminar.type = 'button';
	    eliminar.id = 'eliminar' + iteration;
	    cellFifth.appendChild(eliminar);		    
	    var span = $('<span />', {
            'class' : 'glyphicon glyphicon-trash',
            'aria-hidden':'true'
        }); 
        
	    $("#eliminar"+iteration ).addClass("btn btn-danger btnDel");
	    $("#eliminar"+iteration ).attr("onClick","removeDetalle(this)");		
	    $("#eliminar"+iteration ).append(span)
	});

    jQuery('body').on('keyup.autocomplete', '[id^="examen"]', function() {
        jQuery(this).autocomplete({
            source : url2,
            minLength: 2,
            select: function(event, ui) {
                var row = getRowId($(this));
                event.preventDefault();
                $('#tipo' + row).html(ui.item.tipo);
                $('#muestra' + row).html(ui.item.muestra);
                $('#precio' + row).html(ui.item.precio);
                $('#precioh' + row).val(ui.item.precio);
                $('#ids' + row).val(ui.item.id);
                $('#examen' + row).val(ui.item.value);
                suma();
            }
        });
    });

});	

function removeDetalle(btn) {
    var tbl = document.getElementById('examenes');
    var row1 = tbl.rows.length;
    if(row1 > 2){
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
        suma();
    }
	
    row1 = tbl.rows.length;
    if(row1 == 2){
        $(".btnDel").addClass("disabled");            
    }
    
}

function getRowId(acInput){
     //set prefix, get row number
     var rowPrefix = 'examen';
     var rowNum = acInput.attr("id").substring((rowPrefix.length));
    return rowNum;
}

function suma(){
    var elem = document.getElementsByClassName("precioh");
    var suma = 0;
    var num = 0;
    for (var i = 0; i < elem.length; ++i) {
        num = parseFloat(elem[i].value);
        if(!isNaN(num)){
            suma = suma + num;
        }
    }
    $('#total').val(suma);
}
