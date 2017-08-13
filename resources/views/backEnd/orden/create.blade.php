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
                    	<input type="text" class="form-control" id="cedula_paciente" placeholder="Ingrese una cédula" required onkeypress="return numeroFloat(event, this)">                    	 
                      	<input id="id_paciente" type='hidden'> 
                  	</div>
                  	<div class="col-md-1">
                		<label for="nombre_pacient" class="col-md-1 control-label">Paciente</label>
                	</div>	
                  	<div class="col-md-3">
                    	<input type="text" class="form-control" id="nombre_paciente" placeholder="Paciente" readonly>                      	 
                  	</div>
                  	<div class="col-md-1">
               			<label for="mail" class="col-md-1 control-label">Dirección</label>
               		</div>	
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="direccion_paciente" placeholder="Direccion" readonly>
                    </div>                    
                 </div>
               <div class="form-group row">
               		<div class="col-md-1">
                  		<label for="tel1" class="col-md-1 control-label">Teléfono</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="telefono_paciente" placeholder="Teléfono" readonly>
                    </div>
                    <div class="col-md-1">
                  		<label for="tel1" class="col-md-1 control-label">Celular</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="celular_paciente" placeholder="Celular" readonly>
                    </div>               		
                    <div class="col-md-1">
                 		<label for="tel2" class="col-md-1 control-label">F. Nacimiento</label>
                 	</div>	
                    <div class="col-md-3">
                    	<input type="text" class="form-control" id="fecha_nacimiento"  readonly>
                     </div>
                </div>
                <div class="form-group row">
               		<div class="col-md-1">
                    	<label for="email" class="col-md-1 control-label">Tipo Paciente</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopaciente_id', $items, 1, ['class' => 'form-control','placeholder' => 'Seleccione']) }}                    
                	</div>
               	</div>
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
			                        <th style="width: 25%">Tipo</th>
			                        <th style="width: 25%">Muestra</th>
			                        <th style="width: 10%">Precio</th>
			                        <th style="width: 5%;">Acción</th>
			                    </tr>
			                </thead>
		                    <tbody>
			                    <tr>
			                	    <td>
			                    	    <input type="text" class="form-control" id="examen1" placeholder="Examen" required>
			                            <input type="hidden" id="ids1" name="ids[]">
			                            <input type="hidden" id="precioh1" name="precioh[]" class="precioh">	         		    
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
	                    		<td style="width: 80%;text-align: right;padding-right:10px;">
	                    			<label for="subtotal" class="control-label">SUBTOTAL</label>
	                    		</td>
	                    		<td style="width: 20%">
	                    			<label for="subtotal" class="control-label">
	                    				<span id="subtotal" name="subtotal">$0.00</span>
	                    			</label>	
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 80%;text-align: right;padding-right:10px;">
	                    			<label for="descuento" class="control-label">DESCUENTO</label>
	                    		</td>
	                    		<td style="width: 20%">
	                    			<input type="text" name="descuento" id="descuento" required class="form-control" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)">
	                    		</td>	
	                    	</tr>	                    		                    		
	                    	<tr>
	                    		<td style="width: 80%;text-align: right;padding-right:10px;">
	                    			<label for="total" class="control-label">TOTAL A PAGAR</label>
	                    		</td>
	                    		<td style="width: 20%">
	                    			<label for="total" class="control-label">
										<span id="total" name="total">$0.00</span>
									</label>
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 80%;text-align: right;padding-right:10px;">
	                    			<label for="total" class="control-label">ABONO</label>
	                    		</td>
	                    		<td style="width: 20%">
	                    			<label for="abono" class="control-label">
										<input type="text" name="abono" id="abono" required  class="form-control" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)">
									</label>
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 80%;text-align: right;padding-right:10px;">
	                    			<label for="pendiente" class="control-label">PENDIENTE A PAGAR</label>
	                    		</td>
	                    		<td style="width: 20%">
	                    			<label for="pendiente" class="control-label">
										<span id="pendiente" name="pendiente">$0.00</span>
									</label>
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
    	   	</div>
    	   	</form>
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



@endsection