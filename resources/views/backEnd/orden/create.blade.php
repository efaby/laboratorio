@extends('backLayout.app')
@section('title')
Nuevo Exámen
@stop

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4> Nueva Orden de Examenes</h4>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => 'orden', 'class' => 'form-horizontal', 'id'=>'frmItem']) !!}
                <div class="form-group row">
                	<div class="col-md-1">
                		<label for="nombre_paciente" class="col-md-1 control-label">Nombre Paciente</label>
                	</div>	
                    <div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="nombre_paciente" name="nombre_paciente" placeholder="Ingrese El nombre del Paciente" >
                    	<input type='hidden' id="id_paciente" name="id_paciente" class="form-control input-sm"> 
                  	</div> 
                  	<div class="col-md-1">
                  		<label for="nombre_paciente" class="col-md-1 control-label">Orden Relacional</label>
                  	</div>	
                  	<div class="col-md-3" style="text-align: left;">	
                  		<input type="checkbox" id="is_relacional" name="is_relacional">
                  	</div>
                  	<div class="col-md-4" style="text-align: right;">
                      <a id="nuevaOrden" class="btn btn-default btn-sm">Nueva Orden</a> &nbsp;
                    	<a href="{{ url('paciente') }}" class="btn btn-default btn-sm" target="_blank">Nuevo Paciente</a> &nbsp;
                    	<a href="{{ url('cliente') }}" class="btn btn-default btn-sm" target="_blank">Nuevo Cliente</a>
                  	</div>                  
               </div>
               <div class="form-group row">               		
                  	<div class="col-md-1">
                		<label for="nombre_pacient" class="col-md-1 control-label">Paciente</label>
                	</div>	
                  	<div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="nombre_paciente1" placeholder="Paciente" readonly>                      	 
                  	</div>
                  	<div class="col-md-1">
               			<label for="mail" class="col-md-1 control-label">Dirección</label>
               		</div>	
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="direccion_paciente" placeholder="Dirección" readonly>
                    </div>
               		<div class="col-md-1">
                  		<label for="tel1" class="col-md-1 control-label">Teléfono</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="telefono_paciente" placeholder="Teléfono" readonly>
                    </div>
              </div>
              <div class="form-group row">               		
                    <div class="col-md-1">
                  		<label for="celular" class="col-md-1 control-label">Celular</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="celular_paciente" placeholder="Celular" readonly>
                    </div>               		
                    <div class="col-md-1">
                 		<label for="fecha_nacimiento" class="col-md-1 control-label">Edad</label>
                 	</div>	
                    <div class="form-group col-md-3" style="margin: 0px;">
                    	{!! Form::text('edad', null, ['class' => 'form-control input-sm', 'id' => 'edad', 'placeholder'=>'Ingrese la Edad del Paciente']) !!}                    	
                    </div>
                    <div class="col-md-1">
                 		<label for="fecha_nacimiento" class="col-md-1 control-label">M&eacute;dico</label>
                 	</div>	
                    <div class="form-group col-md-3" style="margin: 0px;">
                    	{!! Form::text('nombre_medico', null, ['class' => 'form-control input-sm', 'id' => 'nombre_medico', 'placeholder'=>'Ingrese el nombre del Médico']) !!}                    	
                    </div>                    
                </div>
                <div class="form-group row">
                	<div class="col-md-1">
                    	<label for="tipo_paciente" class="col-md-1 control-label">Tipo Paciente</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopaciente_id', $items, 1, ['class' => 'form-control input-sm','placeholder' => 'Seleccione','id'=>'tipopaciente_id']) }}                    
                	</div>                    
                	<div class="col-md-1">
                    	<label for="fecha_entrega" class="col-md-1 control-label">Fecha de Entrega</label>
                    </div>
                    <div class="col-md-3">
                     	{!! Form::text('fecha_entrega', null, ['class' => 'form-control input-sm','placeholder' => 'Fecha de Entrega','id'=>'fecha_entrega']) !!}                    	                    
                	</div>
                	<div class="col-md-1">
                    	<label for="tipo_pago" class="col-md-1 control-label">Tipo Pago</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopago_id', ['1' => 'Normal', '2' => 'Mensual'], null, ['class' => 'form-control input-sm','id'=>'tipopago_id']) }}                    
                	</div>
                </div>
                <div class="form-group col-md-12">
                        <a href="{{ url('orden/examenes') }}" data-toggle="modal" class="btn btn-primary" style="float: right;" title="A&ntilde;adir" data-target="#myModal" data-backdrop="static">
                          	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                </div>
                <div >
                <div class="table table-responsive">
	            	<table class="table ttable-striped table-hover table-condensed" id="examenes">
		            	<thead class="bg-primary">
			            	<tr>
			                        <th>Examen</th>
			                        <th style="width: 25%">Tipo</th>
			                        <th style="width: 25%">Muestra</th>
			                        <th style="width: 10%">Precio</th>
			                        <th style="width: 5%;">Acción</th>
			                </tr>
			                </thead>
		                    <tbody id="tbodyExamenes">
		                    </tbody>
	                    </table>
	                    </div>
	                    <table style="width: 100%;text-align: right;">
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;padding-bottom:12px;">
	                    			<div class="col-md-10">
	                    				<label for="subtotal" class="control-label">SUBTOTAL</label>
	                    			</div>
	                    			<div class="col-md-2">
		                    			<label for="subtotal" class="control-label">
		                    				<span id="subtotal" name="subtotal">$0.00</span>
	    	                			</label>
	    	                		</div>		
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;" class="form-group">
	                    			<div class="col-md-10">
	                    				<label for="descuento" class="control-label">DESCUENTO</label>
	                    			</div>
	                    			<div class="col-md-2">
	          							<input type="text" name="descuento" id="descuento" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)" value="0" >
	          						</div>                    				
	                    		</td>	
	                    	</tr>	                    		                    		
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;padding-bottom:12px;">
	                    			<div class="col-md-10">
	                    				<label for="total" class="control-label">TOTAL A PAGAR</label>
	                    			</div>
	                    			<div class="col-md-2">
	                    				<label for="total" class="control-label">
											<span id="total" name="total">$0.00</span>
										</label>
									</div>	
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;" class="form-group">
	                    			<div class="col-md-10">
	                    				<label for="total" class="control-label">ABONO</label>
	                    			</div>
	                    			<div class="col-md-2">	
	                    				<input type="text" name="abono" id="abono" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)" value="0">                							
									</div>									
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;padding-bottom:12px;">
	                    			<div class="col-md-10">
	                    				<label for="pendiente" class="control-label">PENDIENTE A PAGAR</label>
	                    			</div>
	                    			<div class="col-md-2">
		                    			<label for="pendiente" class="control-label">
											<span id="pendiente" name="pendiente">$0.00</span>
										</label>
									</div>	
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td colspan="2" style="width: 100%;text-align: right;">
	                    			<br>
	                    			<a href="{{ url('orden') }}" class="btn btn-info btn-sm" style="float: right;">Cancelar</a> 
	                    			<button type="submit" class="btn btn-primary"  id="addDetalle">
                        		    	<span aria-hidden="true">Guardar</span>
                        			</button> &nbsp;

	                    		                  			
	                    		</td>
	                    	</tr>
	                    </table>

        		</div>        				
    	   	{!! Form::close() !!}
    	</div>   
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog modal-lg" >
			<div class="modal-content">
				<div class="modal-header">
				</div>
			</div>
		</div>	
	</div> 
@endsection

@section('scripts')
<script type="text/javascript">
   var url1 = '{!!URL::route('autocomplete')!!}';
   var url2 = '{!!URL::route('examenesDetalles')!!}';
   var url3 = '{!!URL::route('medicos')!!}';   
   var url4 = '{!!URL::route('autocompletgrupo')!!}';
   
   var token = "{{ csrf_token() }}";
   var myArray = [];
</script>

<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/jquery.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/orden.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/orden.js') }}"></script>
<script src="{{ asset('/js/jquery.datetimepicker.full.min.js') }}"></script>


@endsection