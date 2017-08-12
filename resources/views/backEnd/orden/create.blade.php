@extends('backLayout.app')
@section('title')
Nuevo Exámen
@stop

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4> Nueva Factura</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" id="datos_factura">
                <div class="form-group row">
                	<div class="col-md-1">
                		<label for="cedula_pacient" class="col-md-1 control-label">Cédula</label>
                	</div>	
                  	<div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="cedula_paciente" placeholder="Ingrese una cédula" required>
                      	<input id="id_paciente" type='hidden'> 
                  	</div>
                  	<div class="col-md-1">
                		<label for="nombre_pacient" class="col-md-1 control-label">Paciente</label>
                	</div>	
                  	<div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="nombre_paciente" placeholder="Paciente" readonly>                      	 
                  	</div>
                  	<div class="col-md-1">
               			<label for="mail" class="col-md-1 control-label">Dirección</label>
               		</div>	
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="direccion_paciente" placeholder="Direccion" readonly>
                    </div>                    
                 </div>
               <div class="form-group row">
               		<div class="col-md-1">
                  		<label for="tel1" class="col-md-1 control-label">Teléfono</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="telefono_paciente" placeholder="Teléfono" readonly>
                    </div>
                    <div class="col-md-1">
                  		<label for="tel1" class="col-md-1 control-label">Celular</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="celular_paciente" placeholder="Celular" readonly>
                    </div>               		
                    <div class="col-md-1">
                 		<label for="tel2" class="col-md-1 control-label">F. Nacimiento</label>
                 	</div>	
                    <div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="fecha_nacimiento"  readonly>
                     </div>
                </div>
                <div class="form-group row">
               		<div class="col-md-1">
                    	<label for="email" class="col-md-1 control-label">Pago</label>
                    </div>
                    <div class="col-md-3">
                     	<select class='form-control input-sm' id="condiciones">
                        	<option value="1">Efectivo</option>
                            <option value="2">Cheque</option>
                            <option value="3">Transferencia bancaria</option>
                            <option value="4">Crédito</option>
                     	</select>
                	</div>
               	</div>                
            </form>             
        	<div class="form-group col-xs-12">
                        <button type="button" class="btn btn-primary" style="float: right;" id="addDetalle">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                   </div>
                   <div class="form-group col-xs-12">
                    <table class="table table-responsive table-striped table-hover table-condensed" id="examenes">
                    <thead class="bg-primary">
                    <tr>
                        <th>Examen</th>
                        <th>Tipo</th>
                        <th>Muestra</th>
                        <th>Precio</th>
                        <th style="width: 5%;">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                	    <td>
                    	    <input type="text" class="form-control input-sm" id="examen1" placeholder="Examen" required>	         		    
                    	</td>
                    	<td>
                    		<input type="text" class="form-control input-sm" readonly="readonly" id="tipo1"/>                    		            
                    	</td>
	                    <td>
	                    	<input type="text" class="form-control input-sm" readonly="readonly" id="muestra1"/>
	                    </td>
	                    <td>
	                    	<input type="text" class="form-control input-sm" readonly="readonly" id="precio1"/>
	                    </td>
	                    <td>
	                        <button type="button" class="btn btn-danger" id="eliminar1" onclick="removeDetalle(1)">
	                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
	                        </button>
	                    </td>
                    </tr>
                    </tbody>
                    </table>
         </div>
        </div>
    </div>    
@endsection

@section('scripts')

<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {
        var table = $('#productos').DataTable({
                        "info": false,
                        "lengthChange": false,
                        "dom": 'lrtip'
                    });
		$("#cedula_paciente").autocomplete({
			source : '{!!URL::route('autocomplete')!!}',
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

		    var iteration = lastRow;
		    var row = tbl.insertRow(lastRow);
		    
		    var cellLeft = row.insertCell(0);
		    var el = document.createElement('input');
		    el.type = 'text';
		    el.id = 'examen' + iteration;
		    el.placeholder='Examen';
		    cellLeft.appendChild(el);
		    $("#examen"+iteration ).addClass("form-control input-sm");
		    

		    var cellRight = row.insertCell(1);
		    var tipo = document.createElement('input');
		    tipo.type = 'text';
		    tipo.id = 'tipo' + iteration;
		    tipo.readOnly = true;
		    cellRight.appendChild(tipo);
		    $("#tipo"+iteration ).addClass("form-control input-sm");

		    var cellThird = row.insertCell(2);
		    var muestra = document.createElement('input');
		    muestra.type = 'text';
		    muestra.id = 'muestra' + iteration;
		    muestra.readOnly = true;
		    cellThird.appendChild(muestra);
		    $("#muestra"+iteration ).addClass("form-control input-sm");

		    var cellFourth = row.insertCell(3);
		    var precio = document.createElement('input');
		    precio.type = 'text';
		    precio.id = 'precio' + iteration;
		    precio.readOnly = true;
		    cellFourth.appendChild(precio);
		    $("#precio"+iteration ).addClass("form-control input-sm");

		    var cellFifth = row.insertCell(4);
		    var eliminar = document.createElement('button');
		    eliminar.type = 'button';
		    eliminar.id = 'eliminar' + iteration;
		    cellFifth.appendChild(eliminar);		    
		    var span = $('<span />', {
	            'class' : 'glyphicon glyphicon-trash',
	            'aria-hidden':'true'
	        }); 
	        
		    $("#eliminar"+iteration ).addClass("btn btn-danger");
		    $("#eliminar"+iteration ).attr("onClick","removeDetalle("+ iteration+")");		
		    $("#eliminar"+iteration ).append(span)
		});
	});	

	function removeDetalle(val) {
		var tbl = document.getElementById('examenes');
		tbl.deleteRow(val);
	}
</script>
@endsection