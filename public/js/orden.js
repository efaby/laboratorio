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
			$('#id_paciente').val(ui.item.id);
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
	    var div = document.createElement('div');
	    div.id = 'div' + iteration;
	    cellLeft.appendChild(div);
	    
	    var el = document.createElement('input');
	    el.type = 'text';
	    el.id = 'examen' + iteration;
        el.name = 'examen[]';
	    el.placeholder='Examen';
        div.appendChild(el);
        $("#div"+iteration).addClass("form-group div-examen");
        $('#frmDatosFactura').formValidation('addField', 'examen[]');
        
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
	    
        var h3 = document.createElement('input');
        h3.type = 'hidden';
        h3.id = 'precioe' + iteration;
        h3.name = 'precioe[]';
        
        cellLeft.appendChild(h3);
        $("#precioe"+iteration ).addClass("precioe");
	    
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
    	var row = getRowId($(this));
    	$('#tipo' + row).html("");
        $('#muestra' + row).html("");
        $('#precio' + row).html("");
        $('#precioh' + row).val(0);
        $('#precioe' + row).val(0);
        $('#ids' + row).val(0);
        suma();
        jQuery(this).autocomplete({
            source : url2,
            minLength: 2,
            select: function(event, ui) {
                var row = getRowId($(this));
                event.preventDefault();
                asignarPrecio(ui.item.precio,ui.item.precio_e,row);                
                $('#tipo' + row).html(ui.item.tipo);
                $('#muestra' + row).html(ui.item.muestra);                             
            	$('#precioh' + row).val(ui.item.precio);
            	$('#precioe' + row).val(ui.item.precio_e);
            	$('#ids' + row).val(ui.item.id);
                $('#examen' + row).val(ui.item.value);
                suma();
            }
        });
    });
    
    $('#input').on('keypress', function(e) {
    	console.log('ksk');
        if (e.which == 13) {
            return false;
        }        
    });
    
    $('#descuento').on( 'change', function () {
    	suma();               	
    });
    
    $('#abono').on( 'change', function () {
    	suma();               	
    });
    
    $('#tipopaciente_id').on( 'change', function () {   
    	asignarDetallePrecios();
    	suma();               	
    });
    
    $('#frmDatosFactura').formValidation({
        message: 'This value is not valid',
            fields: {   
            	abono: {
                    message: 'El Abono no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Abono no puede ser vacío.'
                        }
                    }
                },
                descuento: {
                    message: 'El Descuento no es válido',
                    validators: {
                    	 notEmpty: {
                             message: 'El Descuento no puede ser vacío.'
                         }
                    }
                },
                cedula_paciente: {
                    message: 'La Cédula del Paciente no es válido',
                    validators: {
                    	 notEmpty: {
                             message: 'La Cédula del Paciente no puede ser vacío.'
                         },
                         regexp: {
	                           regexp: /^(?:\+)?\d{10}$/,
	                           message: 'Ingrese una cédula con 10 dígitos.'
	                      }
                    }
                },
                'examen[]': {
                    message: 'El Exámen no es válido',
                    validators: {
                    	 notEmpty: {
                             message: 'El Exámen no puede ser vacío.'
                         }
                    }
                }
            }
    })
    // Called after adding new field
    .on('added.field.fv', function(e, data) {
        // data.field   --> The field name
        // data.element --> The new field element
        // data.options --> The new field options

        if (data.field === 'examen[]') {
            if ($('#frmDatosFactura').find(':visible[name="examen[]"]').length >= 1) {
                $('#frmDatosFactura').find('.addButton').attr('disabled', 'disabled');
            }
        }
    })

    // Called after removing the field
    .on('removed.field.fv', function(e, data) {
       if (data.field === 'examen[]') {
            if ($('#frmDatosFactura').find(':visible[name="examen[]"]').length < 1) {
                $('#frmDatosFactura').find('.addButton').removeAttr('disabled');
            }
        }
    });
});	

function asignarPrecio(precioh, precioe,row){
	var tipo_paciente = $("#tipopaciente_id").val();
	var precio = precioe;
	if(tipo_paciente ==1){
		precio = precioh;	
	}
	$('#precio' + row).html(precio);
	
}


function removeDetalle(btn) {
    var tbl = document.getElementById('examenes');
    var row1 = tbl.rows.length;
    if(row1 > 2){
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
        $('#frmDatosFactura').formValidation('removeField', row);
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
	var tipo_paciente = $("#tipopaciente_id").val();
	var className = "precioe"
	if(tipo_paciente ==1){
		className = "precioh";	
	}
	var elem = document.getElementsByClassName(className);	
    var descuento = jQuery("#descuento").val();
    var abono = jQuery("#abono").val();
    var suma = 0;
    var num = 0;
    for (var i = 0; i < elem.length; ++i) {
        num = parseFloat(elem[i].value);
        if(!isNaN(num)){
            suma = suma + num;            
        }
    }
    total = suma;
    if(!isNaN(descuento)){
    	total = suma - descuento;
    }
    suma = suma.toFixed(2);    
    total = total.toFixed(2);
    $("#subtotal").text("$"+suma);
    $("#total").text("$"+total);
    
    if(!isNaN(abono)){
    	pendiente = total - abono;
    }
    pendiente = pendiente.toFixed(2);
    $("#pendiente").text("$"+pendiente);
}

function asignarDetallePrecios(){
	var cont = 1;	
	var elem = document.getElementsByClassName("precioh");
    for (var i = 0; i < elem.length; ++i) {
    	//num = parseFloat(elem[cont].value);
    	precioh = $("#precioh"+cont).val();
    	precioe = $("#precioe"+cont).val();
        if(!isNaN(precioh)){        	
        	console.log(precioh, precioe,cont);
            asignarPrecio(precioh, precioe,cont);            
        } else {
        	i = i-1;
        }   
        cont = cont + 1;
        console.log("holas");
    }
    
}

function numeroFloat(evt, sender) {
    var anterior = $(sender).val();
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if ($.trim(anterior) == '' && charCode == 46) {
        return false;
    }

    if (charCode == 45) {
        return true;
    }
    if (charCode == 46 && anterior.indexOf('.') == -1) {
        return true;
    }
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function soloNumeros(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}