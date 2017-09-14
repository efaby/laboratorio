@extends('backLayout.app')
@section('title')
Editar Exámen
@stop

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4> Editar Orden de Exámenes</h4>
        </div>
        <div class="panel-body">
            {!! Form::model($orden, [
        			'method' => 'PATCH',
        			'url' => ['orden', $orden['id']],
        			'class' => 'form-horizontal',
        			'id'=>'frmItem'
    		]) !!}
                <div class="form-group row">
                	<div class="col-md-1">
                		<label for="nombre_paciente" class="col-md-1 control-label">Nombre Paciente</label>
                	</div>	
                    <div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="nombre_paciente" name="nombre_paciente" placeholder="Ingrese El nombre del Paciente" readonly>
                    	<input type='hidden' id="id_paciente" name="id_paciente" class="form-control input-sm"> 
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
                        <input type="text" class="form-control input-sm" id="direccion_paciente" name="direccion_paciente" 
                        placeholder="Dirección" value="{{$orden['direccion_paciente']}}" readonly>
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
                    	{!! Form::text('edad', null, ['class' => 'form-control input-sm', 'id' => 'edad','readonly'=>'true', 'placeholder'=>'Ingrese la Edad del Paciente']) !!}                    	
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
                     	{{ Form::select('tipopaciente_id', $items, 1, ['class' => 'form-control input-sm','readonly'=>'true','placeholder' => 'Seleccione','id'=>'tipopaciente_id']) }}                    
                	</div>                    
                	<div class="col-md-1">
                    	<label for="fecha_entrega" class="col-md-1 control-label">Fecha de Entrega</label>
                    </div>
                    <div class="col-md-3">
                     	{!! Form::text('fecha_entrega', null, ['class' => 'form-control input-sm','readonly'=>'true','placeholder' => 'Fecha de Entrega','id'=>'fecha_entrega']) !!}                    	                    
                	</div>
                	<div class="col-md-1">
                    	<label for="tipo_pago" class="col-md-1 control-label">Tipo Pago</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopago_id', ['1' => 'Normal', '2' => 'Mensual'], null, ['class' => 'form-control input-sm','id'=>'tipopago_id','readonly'=>'true']) }}                    
                	</div>
                </div>
                <div class="form-group col-xs-12">
                        <button type="button" class="btn btn-primary" style="float: right;" id="addDetalle">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                </div>
                <div class="col-xs-12">
	            	<table class="table table-responsive table-striped table-hover table-condensed" id="examenes">
		            	<thead class="bg-primary">
			            	<tr>
			                        <th>Examen</th>
			                        <th style="width: 25%">Tipo</th>
			                        <th style="width: 25%">Muestra</th>
			                        <th style="width: 10%">Precio</th>
			                        <th style="width: 5%;">Acción</th>
			                    </tr>
			                </thead>
		                    <tbody>
			                    <tr>
			                	    <td>
			                	    	<div class="form-group div-examen">
				                    	    <input type="text" class="form-control input-sm" id="examen1" name="examen[]" placeholder="Examen">
				                            <input type="hidden" id="ids1" name="ids[]">
				                            <input type="hidden" id="preciop1" name="preciop[]" class="preciop">
				                            <input type="hidden" id="preciol1" name="preciol[]" class="preciol">
				                            <input type="hidden" id="precioc1" name="precioc[]" class="precioc">
			                            </div>	         		    
			                    	</td>
			                    	<td>
			                            <div id="tipo1" class="texto-span"></div>                   		            
			                    	</td>
				                    <td>
			                            <div id="muestra1" class="texto-span"></div>
				                    </td>
				                    <td>
			                            <div id="precio1" class="texto-span"></div>
				                    </td>
				                    <td>
				                        <button type="button" class="btn btn-danger btnDel btn-sm disabled" id="eliminar1" onclick="removeDetalle(this)">
				                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				                        </button>
				                    </td>
			                    </tr>
		                    </tbody>
	                    </table>
	                    <table style="width: 100%;text-align: right;">
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;padding-right:10px;padding-bottom:12px;">
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
	                    		<td style="width: 100%;text-align: right;padding-right:10px;" class="form-group">
	                    			<div class="col-md-10">
	                    				<label for="descuento" class="control-label">DESCUENTO</label>
	                    			</div>
	                    			<div class="col-md-2">
	          							<input type="text" name="descuento" id="descuento" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)" value="0">
	          						</div>                    				
	                    		</td>	
	                    	</tr>	                    		                    		
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;padding-right:10px;padding-bottom:12px;">
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
	                    		<td style="width: 100%;text-align: right;padding-right:10px;" class="form-group">
	                    			<div class="col-md-10">
	                    				<label for="total" class="control-label">ABONO</label>
	                    			</div>
	                    			<div class="col-md-2">	
	                    				<input type="text" name="abono" id="abono" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)" value="0">                							
									</div>									
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;padding-right:10px;padding-bottom:12px;">
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
	                    		<td colspan="2" style="width: 100%;text-align: right;padding-right:1px;">
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
@endsection

@section('scripts')
<script type="text/javascript">
   var url1 = '{!!URL::route('autocomplete')!!}';
   var url2 = '{!!URL::route('examenes')!!}';
   var url3 = '{!!URL::route('medicos')!!}';
</script>
<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/datepicker.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/orden.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/orden.js') }}"></script>
<script src="{{ asset('/js/calendar.js') }}"></script>


@endsection