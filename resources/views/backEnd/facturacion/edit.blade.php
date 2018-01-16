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
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('status') }} fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('message') }}
        </div>
    	@endif
    	{!! Form::open(['url' => '#', 'class' => 'form-horizontal','id'=>'frmFacturacion']) !!}
    	<div class="panel-body">
            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		  	<div class="form-group row">
              		<div class="col-md-1">
                		<label for="cedula" class="col-md-1 control-label">Cédula/RUC</label>
                	</div>	
                    <div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="cedula" name="cedula" value="{{ $paciente->cedula }}" required>                 
                    	<input type="hidden" id="paciente_id" name="paciente_id" value="{{$paciente->id}} ">                  	 
                  	</div>
                  	<div class="col-md-2" style="text-align: left" id="val1">
                  		<input type="checkbox" id="consumidor_final" name="consumidor_final"><b>Consumidor Final</b>
                  	</div>
                  	<div class="col-md-3" style="text-align: left" id="val2">
                      <a href="{{ url('cliente') }}" class="btn btn-default btn-sm" target="_blank" id="nuevo_cliente">Nuevo Cliente</a>
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
                    <div class="col-md-1">
               			<label for="mail" class="col-md-1 control-label">Num. Factura</label>
               		</div>	
                    <div class="col-md-5">
                        <input type="text" class="form-control input-sm" id="num_factura" name="num_factura" 
                        placeholder="Número de Factura" value="">
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
	                    	 	<td style="text-align: right;">$<?php echo $total; ?></td>
	                    		<td style="text-align: right;">$<?php echo $total; ?></td>	
	                    	</tr>
		                 </tbody>    
			        </table>        
			         <table style="width: 100%;text-align: right;">
			         		<tr>
	                    	 	<td style="text-align: right;padding-bottom:12px;width: 90%">
	                    			<label for="total" class="control-label">Total</label>
	                    		</td>			
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="total" class="control-label">
										<span id="total" name="total">$<?php echo $total; ?></span>
									</label>									
	                    		</td>	
	                    	</tr>	                    	
	                    	<tr>
	                    	 	<td style="text-align: right;padding-bottom:12px;width: 90%">
	                    			<label for="total" class="control-label">Abono</label>
	                    		</td>			
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="total" class="control-label">
										<span id="total" name="total">$<?php echo $abono; ?></span>
									</label>									
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    	 	<td style="text-align: right;padding-bottom:12px;width: 90%">
	                    			<label for="total" class="control-label">TOTAL A PAGAR</label>
	                    		</td>			
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="total" class="control-label">
										<span id="total" name="total">$<?php echo number_format($total_pagar,2); ?></span>
									</label>									
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td colspan="2" style="text-align: right;padding-right:1px;">
	                    			<br>
	                    				                    			
	                    			<input type="hidden" id="orden_id" name="orden_id" value="{{$orden->id}}">
	                    			<a href="{{ url('facturacion/individual') }}" class="btn btn-default btn-sm" style="float: right;">Cancelar</a> &nbsp;&nbsp;
	                    			<a href="#" style="margin-right:7px" id="imprimir" class="btn btn-info btn-sm" title="Facturar">
                                        Facturar
                                    </a>
                        			<input type="hidden" id="factura_id" name="factura_id" value="0">
                        			<a href="#" style="margin-right:7px" id="anexo" class="btn btn-warning btn-sm" title="Anexo" disabled>
                                        Anexo
                                    </a>
	                    		</td>	                    		
	                    	</tr>
	                    </table>			        
               </div>    	   	
    	</div>
    	{!! Form::close() !!}
@endsection
@section('scripts')

<script type="text/javascript">	
	var url = '{!!URL::route('obtenerCliente')!!}';
	var url1 = '{{ url('facturacion/imprimirIndividual/') }}';
	
	 $(document).ready(function() {
	       $('#frmFacturacion').formValidation({
	        message: 'This value is not valid',
	            fields: {   
	            	cedula: {
	                    message: 'El Número de Identificación no es válido',
	                    validators: {
	                        notEmpty: {
	                            message: 'El Número de Identificación no puede ser vacío.'
	                        },                   
	                        regexp: {
	                            regexp: /^(?:\+)?\d{10,13}$/,
	                            message: 'Ingrese un Número de Identificación válido.'
	                        }                               
	                    }
	                },
	                paciente_id: {
	                	excluded: false,   
	                    validators: {
	                        greaterThan: {
	                            value: 1,
	                            message: 'El Cliente no esta registrado'
	                        }
	                    }
                
	                }
	            }
	        });
	});
		
	$('#cedula').on( 'change', function () {
		jQuery.ajax({
			   type: "GET",
			   url: url,
			   data: {
			      	"id": $('#cedula').val()    	
			   },
			   success:function(ui) {
		   			$('#paciente_id').val(ui.id);
					$('#cedula').val(ui.cedula);
					$('#nombre').val(ui.nombres+' '+ui.apellidos);
					$('#direccion_paciente').val(ui.direccion);
					$('#telefono_paciente').val(ui.telefono);	
					$('#frmFacturacion').formValidation('revalidateField', 'paciente_id');	   		
				  	
			   }
			});		
	});

	$('#consumidor_final').on( 'change', function () {
		if($('#factura_id').val() == 0) {
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
		}
	});

	 $("#imprimir").click(function() {
	 		if($('#paciente_id').val() > 0) {
	 			var token = "{{ csrf_token() }}";
		        var url2 = '{!!URL::route('guardarFacturaIndividual')!!}';
		        if($('#factura_id').val()>0) {
		            window.open(url1 + "/" + $('#factura_id').val(), 'popup', 'width=750,height=450');
		        } else {
			        if($('#paciente_id').val() != null){
			             $.ajax({
			                type: "POST",
			                url: url2,
			                data: {"_token": token, paciente_id: $('#paciente_id').val(), orden_id: {{$orden->id}},total:{{$total}},is_relacional:{{$orden->is_relacional}}, num_factura: $('#num_factura').val() },
			                success: function( response ) {
			                        $('#factura_id').val(response);
			                        $('#anexo').attr("disabled", false);
			                        $("#imprimir").attr("disabled", true);
			                        $("#nuevo_cliente").attr("disabled", true);
			                        $("#num_factura").attr("disabled", true);
			                        $("#cedula").attr("disabled", true);
			                        $('#val1').hide();
			                        $('#val2').hide();
			                        window.open(url1 + "/" + response, 'popup', 'width=750,height=450');
			                    }
			            });	        	
			        }
		        }
	 		} 
	       
	  });

	 $("#anexo").click(function() {
	        if($('#factura_id').val()>0) {
	            var url3 = '{{ url('facturacion/anexoIndividual/') }}';
	            window.open(url3 + "/" + $('#factura_id').val(), 'popup', 'width=800,height=450');
	        }
	   });		
	
</script>
<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/orden.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
@endsection