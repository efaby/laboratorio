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
                  	<div class="col-md-2" style="text-align: left">
                  		<input type="checkbox" id="consumidor_final" name="consumidor_final"><b>Consumidor Final</b>
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
			        		<tr>
	                    	 	<td>1</td>
	                    	 	<td>Exámenes de Laboratorio</td>
	                    	 	<td style="text-align: right;">$<?php echo $orden->total; ?></td>
	                    		<td style="text-align: right;">$<?php echo $orden->total; ?></td>	
	                    	</tr>
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
	                    	 	<td style="text-align: right;padding-bottom:12px;width: 90%">
	                    			<label for="total" class="control-label">TOTAL</label>
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
	                    			<input type="hidden" id="paciente_id" name="paciente_id" value="{{$paciente->id}} ">	                    			
	                    			<input type="hidden" id="orden_id" name="orden_id" value="{{$orden->id}}">
	                    			<a href="{{ url('facturacion/individual') }}" class="btn btn-default btn-sm" style="float: right;">Cancelar</a> &nbsp;&nbsp;
	                    			<a id="imprimir" href="{{ url('facturacion/imprimirIndividual/' . $orden->id.'-'.$paciente->id) }}" target="popup" style="margin-right:7px" onClick="window.open(this.href, this.target, 'width=750,height=450'); return false;" class="btn btn-info btn-sm" title="Imprimir">
                          				Imprimir
                        			</a>
                        			<a href="#" style="margin-right:7px" id="anexo" class="btn btn-warning btn-sm" title="Anexo" disabled>
                                        Anexo
                                    </a>
	                    		</td>
	                    	</tr>
	                    </table>			        
               </div>
    	   	{!! Form::close() !!}
    	</div>
@endsection
@section('scripts')
<script type="text/javascript">	
	var url = '{!!URL::route('obtenerCliente')!!}';
	var url1 = '{{ url('facturacion/imprimirIndividual/') }}';
	
	$('#cedula').on( 'change', function () {
		jQuery.ajax({
			   type: "GET",
			   url: url,
			   data: {
			      	"id": $('#cedula').val()    	
			   },
			   success:function(ui) {
				   if(ui.id){
					    $('#paciente_id').val(ui.id);
					   	$('#cedula').val(ui.cedula);
					   	$('#nombre').val(ui.nombres+' '+ui.apellidos);
						$('#direccion_paciente').val(ui.direccion);
						$('#telefono_paciente').val(ui.telefono);	
						val = url1+"/"+$('#orden_id').val()+'-'+ui.id;
						$("#imprimir").attr('href',val);			   				    			           	
				   }else{
						$("#imprimir").attr('disabled','disabled');
						$(".alert alert-danger").val('Ese usuario no existe');
						$('#nombre').val(null);
						$('#direccion_paciente').val(null);
						$('#telefono_paciente').val(null);
				   }
			   }
			});		
	});

	$('#consumidor_final').on( 'change', function () {
		if ($('#consumidor_final').is(":checked")){
			jQuery.ajax({
				   type: "GET",
				   url: url,
				   success:function(ui) {
					    $('#paciente_id').val(ui.id);
					   	$('#cedula').val(ui.cedula);
					   	$("#cedula").attr('disabled','disabled');
					   	$('#nombre').val(ui.nombres+' '+ui.apellidos);
						$('#direccion_paciente').val(ui.direccion);
						$('#telefono_paciente').val(ui.telefono);
						val = url1+"/"+$('#orden_id').val()+'-'+ui.id;
						$("#imprimir").attr('href',val);
				   }
			});
		}else{
			$("#cedula").removeAttr('disabled');
			$('#paciente_id').val(null);
			$('#cedula').val(null);		
			$('#nombre').val(null);
			$('#direccion_paciente').val(null);
			$('#telefono_paciente').val(null);
		}
	});
	
</script>
<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/orden.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
@endsection