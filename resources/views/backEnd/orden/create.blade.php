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
            {!! Form::open(['url' => 'orden', 'class' => 'form-horizontal', 'id'=>'frmItem']) !!}
                <div class="form-group row">
                	<div class="col-md-1">
                		<label for="cedula_pacient" class="col-md-1 control-label">Cédula</label>
                	</div>	
                    <div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="cedula_paciente" name="cedula_paciente" placeholder="Ingrese una Cédula" onkeypress="return numeroFloat(event, this)">
                    	<input type='hidden' id="id_paciente" name="id_paciente" class="form-control input-sm"> 
                  	</div>                  
               </div>
               <div class="form-group row">               		
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
                 		<label for="fecha_nacimiento" class="col-md-1 control-label">F. Nacimiento</label>
                 	</div>	
                    <div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="fecha_nacimiento" placeholder="Fecha de Nacimiento" readonly>
                    </div>
                    <div class="col-md-1">
                    	<label for="tipo_paciente" class="col-md-1 control-label">Tipo Paciente</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopaciente_id', $items, 1, ['class' => 'form-control input-sm','placeholder' => 'Seleccione','id'=>'tipopaciente_id']) }}                    
                	</div>
                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                    	<label for="tipo_pago" class="col-md-1 control-label">Tipo Pago</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopago_id', ['1' => 'Normal', '2' => 'Mensual'], null, ['class' => 'form-control input-sm','id'=>'tipopago_id','placeholder' => 'Seleccione']) }}                    
                	</div>
                	<div class="col-md-1">
                    	<label for="fecha_entrega" class="col-md-1 control-label">Fecha de Entrega</label>
                    </div>
                    <div class="col-md-3">
                     	{!! Form::text('fecha_entrega', null, ['class' => 'form-control input-sm','placeholder' => 'Fecha de Entrega','id'=>'fecha_entrega']) !!}                    	                    
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
				                            <input type="hidden" id="precioh1" name="precioh[]" class="precioh">
				                            <input type="hidden" id="precioe1" name="precioe[]" class="precioe">
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
				                        <button type="button" class="btn btn-danger btnDel disabled" id="eliminar1" onclick="removeDetalle(this)">
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
	          							<input type="text" name="descuento" id="descuento" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)">
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
	                    				<input type="text" name="abono" id="abono" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)">                							
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
	                    			<button type="submit" class="btn btn-primary" style="float: right;" id="addDetalle">
                        		    	<span aria-hidden="true">Guardar</span>
                        			</button>
	                    		                  			
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
</script>
<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/orden.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/orden.js') }}"></script>
<script src="{{ asset('/js/calendar.js') }}"></script>


@endsection