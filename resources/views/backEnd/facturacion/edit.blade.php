@extends('backLayout.app')
@section('title')
Facturación
@stop

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4> Facturación</h4>
        </div>
        <div class="panel-body">
            {!! Form::model($orden, [
        			'method' => 'PATCH',
        			'url' => ['orden', $orden->id],
        			'class' => 'form-horizontal',
        			'id'=>'frmIndividual'
    		]) !!}
              <div class="form-group row">
              		<div class="col-md-1">
                		<label for="cedula" class="col-md-1 control-label">Cédula/RUC</label>
                	</div>	
                    <div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="cedula" name="cedula" value="{{ $paciente->cedula }}">                    	 
                  	</div>
                	<div class="col-md-3" style="text-align: left">
                      <a href="{{ url('cliente') }}" class="btn btn-default btn-sm" target="_blank">Nuevo Cliente</a>
                  	</div>                  
               </div>
               <div class="form-group row">
              		<div class="col-md-1">
                		<label for="nombre" class="col-md-1 control-label">Nombre</label>
                	</div>	
                    <div class="col-md-5">
                    	<input type="text" class="form-control input-sm" id="nombre" name="nombre" value=" {{ $paciente->nombres }} {{ $paciente->apellidos }}" readonly>                    	 
                  	</div>            
               </div>
              
               <div class="form-group row">
               		<div class="col-md-1">
               			<label for="mail" class="col-md-1 control-label">Dirección</label>
               		</div>	
                    <div class="col-md-5">
                        <input type="text" class="form-control input-sm" id="direccion_paciente" name="direccion_paciente" 
                        placeholder="Dirección" value="{{ $paciente->direccion }}" readonly>
                    </div>
                    <div class="col-md-1">
                  		<label for="tel1" class="col-md-1 control-label">Teléfono</label>
                  	</div>
                    <div class="col-md-5">
                        <input type="text" class="form-control input-sm" id="telefono_paciente" placeholder="Teléfono"
                         value="{{ $paciente->telefono }}" readonly>
                    </div>
               </div> 				
               <div class="form-group row">
               		<div class="col-md-1">
               			<label for="mail" class="col-md-1 control-label">Fecha Emisión</label>
               		</div>	
                    <div class="col-md-5">
                        <input type="text" class="form-control input-sm" id="fecha_facturacion" name="fecha_facturacion" 
                        placeholder="Dirección" value="{{ $orden->fecha_facturacion }}" readonly>
                    </div>                    
               </div>
               <div class="table table-responsive">
	           		<table class="table table-responsive table-striped table-hover table-condensed" id="examenes">
		            	<thead class="bg-primary">
			        	   	<tr>
			                	<th style="width: 10%">Cant.</th>
			                    <th style="text-align: center">Descripción</th>
			                    <th style="width: 10%">V.Unit</th>
			                    <th style="width: 10%">V.Total</th>			                    
			                </tr>
			        	</thead>
			        	<tbody id="tbodyExamenes">
			        		<?php
			        			foreach ($detalleorden as $item) { ?>
			        			<tr>
			                	    <td>
			                	    	1		                	    		         		    
			                    	</td>
			                    	<td>
			                            <?php echo $item->examen; ?>                   		            
			                    	</td>
				                    <td style="text-align: right">
			                            $<?php echo $item->precio; ?>
				                    </td>
				                    <td style="text-align: right">
			                            $<?php echo $item->precio; ?>
				                    </td>				                    
			                    </tr>
			                <?php } ?>
		                 </tbody>    
			        </table>        
			         <table style="width: 100%;text-align: right;">
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px;padding-right: 5px;width: 90%">
	                    			<label for="subtotal" class="control-label">SUBTOTAL</label>	                    				                    					
	                    		</td>	
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="subtotal" class="control-label">
		                    			<span id="subtotal" name="subtotal">$<?php echo $orden->subtotal; ?></span>
	    	                		</label>	    	                				
	                    		</td>
	                    	</tr>
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px;padding-right: 5px;">
	                    			<label for="descuento" class="control-label">DESCUENTO</label>
	                    		</td>	
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="descuento" class="control-label">
		                    			<span id="descuento" name="descuento">$<?php echo $orden->descuento; ?></span>
	    	                		</label>            				
	                    		</td>	
	                    	</tr>	                    		                    		
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px">
	                    			<label for="descuento" class="control-label">TARIFA IVA 0%</label>
	                    		</td>	
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">	          							
	                    			<label for="iva_cero" class="control-label">
		                    			<span id="iva_cero" name="iva_cero">$0.00</span>
	    	                		</label>            				
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px">
	                    			<label for="descuento" class="control-label">TARIFA IVA 12%</label>
	                    		</td>			
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="iva_doce" class="control-label">
		                    			<span id="iva_doce" name="iva_cero">$0.00</span>
	    	                		</label>            				
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px">
	                    			<label for="descuento" class="control-label">IMPORTE IVA</label>
	                    		</td>			
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="iva_doce" class="control-label">
		                    			<span id="iva_doce" name="iva_cero">$0.00</span>
	    	                		</label>            				
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px">
	                    			<label for="total" class="control-label">TOTAL $</label>
	                    		</td>			
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="total" class="control-label">
										<span id="total" name="total">$<?php echo $orden->total; ?></span>
									</label>									
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td colspan="2" style="text-align: right;padding-right:1px;">
	                    			<br>
	                    			<a href="{{ url('facturacion/individual') }}" class="btn btn-default btn-sm" style="float: right;">Cancelar</a> &nbsp;&nbsp;
	                    			<a href="{{ url('facturacion/imprimirIndividual/' . $item->id) }}" target="popup" style="margin-right:7px" onClick="window.open(this.href, this.target, 'width=750,height=450'); return false;" class="btn btn-info btn-sm" title="Imprimir">
                          				Imprimir
                        			</a>                  			       		                  			
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
</script>
<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/orden.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/orden.js') }}"></script>
@endsection