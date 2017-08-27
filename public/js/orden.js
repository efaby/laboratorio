 var iteration = 1;
$(document).ready(function() {
	var table = $('#productos').DataTable({
                    "info": false,
                    "lengthChange": false,
                    "dom": 'lrtip'
                });
	$("#nombre_paciente").autocomplete({
		source : url1,
		minLength: 3,
		select: function(event, ui) {
			event.preventDefault();
			$('#id_paciente').val(ui.item.id);
			$('#nombre_paciente1').val(ui.item.nombres);
			$('#telefono_paciente').val(ui.item.telefono);
			$('#celular_paciente').val(ui.item.celular);
			$('#direccion_paciente').val(ui.item.direccion);
			$('#edad').val(ui.item.edad);
            $("#nombre_paciente").val(ui.item.value); 
            $('#frmItem').formValidation('revalidateField', 'nombre_paciente');             
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
        var h21 = document.createElement('input');
        h21.type = 'hidden';
        h21.id = 'muestras' + iteration;
        h21.name = 'muestras[]';
        cellLeft.appendChild(h21);
        var h2 = document.createElement('input');
        h2.type = 'hidden';
        h2.id = 'preciop' + iteration;
        h2.name = 'preciop[]';
        
        cellLeft.appendChild(h2);
	    $("#examen"+iteration ).addClass("form-control input-sm");
        $("#preciop"+iteration ).addClass("preciop");
	    
        var h3 = document.createElement('input');
        h3.type = 'hidden';
        h3.id = 'preciol' + iteration;
        h3.name = 'preciol[]';
        
        cellLeft.appendChild(h3);
        $("#preciol"+iteration ).addClass("preciol");

        var h31 = document.createElement('input');
        h31.type = 'hidden';
        h31.id = 'precioc' + iteration;
        h31.name = 'precioc[]';
        
        cellLeft.appendChild(h31);
        $("#precioc"+iteration ).addClass("precioc");
	    
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
        
	    $("#eliminar"+iteration ).addClass("btn btn-danger btnDel btn-sm");
	    $("#eliminar"+iteration ).attr("onClick","removeDetalle(this)");		
	    $("#eliminar"+iteration ).append(span)
	});
	
    jQuery('body').on('keyup.autocomplete', '[id^="examen"]', function() {
    	var row = getRowId($(this));
    	$('#tipo' + row).html("");
        $('#muestra' + row).html("");
        $('#precio' + row).html("");
        $('#preciop' + row).val(0);
        $('#preciol' + row).val(0);
        $('#precioc' + row).val(0);
        $('#ids' + row).val(0);
        suma();
        jQuery(this).autocomplete({
            source : url2,
            minLength: 2,
            select: function(event, ui) {
                var row = getRowId($(this));
                event.preventDefault();
                asignarPrecio(ui.item.precio_normal,ui.item.precio_laboratorio,ui.item.precio_clinica,row);                
                $('#tipo' + row).html(ui.item.tipo);
                $('#muestra' + row).html(ui.item.muestra);                             
            	$('#preciop' + row).val(ui.item.precio_normal);
            	$('#preciol' + row).val(ui.item.precio_laboratorio);
                $('#precioc' + row).val(ui.item.precio_clinica);
            	$('#ids' + row).val(ui.item.id);
                $('#muestras' + row).val(ui.item.muestraId);
                $('#examen' + row).val(ui.item.examen);
                $('#frmItem').formValidation('revalidateField', 'examen[]');   
                suma();
            }
        });
    });
    
    jQuery( "#fecha_entrega" ).datepicker({  
		dateFormat: "yy-mm-dd",
		minDate: new Date(),
		onClose: function(selectedDate) {
			$('#fecha_entrega').datepicker('option', 'minDate', selectedDate);
			$('#frmItem').formValidation('revalidateField', 'fecha_entrega');	        
	      }  		
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
    
    $('#frmItem').formValidation({
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
                tipopago_id: {
                    message: 'El Tipo de Pago no es válido',
                    validators: {
                    	 notEmpty: {
                             message: 'El Tipo de Pago no puede ser vacío.'
                         }
                    }
                },
                fecha_entrega: {
                    message: 'La Fecha de Entrega no es válida',
                    validators: {
                    	 notEmpty: {
                             message: 'La Fecha de Entrega no puede ser vacía.'
                    	 },
						 date:{	 
							    format: 'YYYY-MM-DD',
			                    message: 'La fecha de ingreso no es válida.'				                    
						 }
                    }
                },
               
                nombre_paciente: {
                    message: 'El Nombre del Paciente no es válido',
                    validators: {
                    	 notEmpty: {
                             message: 'El Nombre del Paciente no puede ser vacío.'
                         },
                         regexp: {
	                           regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
	                           message: 'El Nombre del Paciente un nombre válido.'
	                      }
                    }
                },
                edad: {
                       message: 'La edad no es válida',
                       validators: {
                        notEmpty: {
                               message: 'La edad no puede ser vacía.'
                           },
                         regexp: {
                             regexp: /^[1-9]\d*$/,
                             message: 'Ingrese una edad válida.'
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

function asignarPrecio(preciop, preciol,precioc,row){
	var tipo_paciente = $("#tipopaciente_id").val();
    precio = 0;
	if(tipo_paciente ==1){
		precio = preciop;	
	}
    if(tipo_paciente ==2){
        precio = preciol;   
    }
    if(tipo_paciente ==3){
        precio = precioc;   
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
	
	if(tipo_paciente ==1){
		className = "preciop";	
	}
    if(tipo_paciente ==2){
        className = "preciol";  
    }
    if(tipo_paciente ==3){
        className = "precioc";  
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
	var elem = document.getElementsByClassName("preciop");
    for (var i = 0; i < elem.length; ++i) {
    	//num = parseFloat(elem[cont].value);
    	preciop = $("#preciop"+cont).val();
    	preciol = $("#preciol"+cont).val();
        precioc = $("#precioc"+cont).val();
        if(!isNaN(preciop)){        	
            asignarPrecio(preciop, preciol,precioc,cont);            
        } else {
        	i = i-1;
        }   
        cont = cont + 1;
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