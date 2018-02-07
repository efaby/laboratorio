@extends('backLayout.app')
@section('title')
Nuevo Exámen
@stop

@section('content')

<h3 class="page-heading mb-4">Nueva Orden de Examenes</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

            {!! Form::open(['url' => 'orden', 'class' => 'form-horizontal', 'id'=>'frmItem']) !!}
                <div class="form-group row">
                	<div class="col-md-1">
                		<label for="nombre_paciente" class="control-label">Nombre Paciente</label>
                	</div>	
                    <div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="nombre_paciente" name="nombre_paciente" placeholder="Ingrese El nombre del Paciente" >
                    	<input type='hidden' id="id_paciente" name="id_paciente" class="form-control input-sm"> 
                  	</div> 
                  	<div class="col-md-1">
                  		<label for="nombre_paciente" class="control-label">Orden Relacional</label>
                  	</div>	
                  	<div class="col-md-3" style="text-align: left;">	
                  		<input type="checkbox" id="is_relacional" name="is_relacional">
                  	</div>
                  	<div class="col-md-4" style="text-align: right;">
                      	<a id="nuevaOrden" class="btn btn-warning mr-2">Nueva Orden</a> &nbsp;
                    	<a href="{{ url('paciente') }}" class="btn btn-info mr-2" target="_blank">Nuevo Paciente</a>                    	
                  	</div>                  
               </div>
               <div class="form-group row">               		
                  	<div class="col-md-1">
                		<label for="nombre_pacient" class="control-label">Paciente</label>
                	</div>	
                  	<div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="nombre_paciente1" placeholder="Paciente" readonly>                      	 
                  	</div>
                  	<div class="col-md-1">
               			<label for="mail" class="control-label">Dirección</label>
               		</div>	
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="direccion_paciente" placeholder="Dirección" readonly>
                    </div>
               		<div class="col-md-1">
                  		<label for="tel1" class="control-label">Teléfono</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="telefono_paciente" placeholder="Teléfono" readonly>
                    </div>
              </div>
              <div class="form-group row">               		
                    <div class="col-md-1">
                  		<label for="celular" class="control-label">Celular</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="celular_paciente" placeholder="Celular" readonly>
                    </div>               		
                    <div class="col-md-1">
                 		<label for="fecha_nacimiento" class="control-label">Edad</label>
                 	</div>	
                    <div class="form-group col-md-3" style="margin: 0px;">
                    	{!! Form::text('edad', null, ['class' => 'form-control input-sm', 'id' => 'edad', 'placeholder'=>'Ingrese la Edad del Paciente']) !!}                    	
                    </div>
                    <div class="col-md-1">
                 		<label for="fecha_nacimiento" class="control-label">M&eacute;dico</label>
                 	</div>	
                    <div class="form-group col-md-3" style="margin: 0px;">
                    	{!! Form::text('nombre_medico', null, ['class' => 'form-control input-sm', 'id' => 'nombre_medico', 'placeholder'=>'Ingrese el nombre del Médico']) !!}                    	
                    </div>                    
                </div>
                <div class="form-group row">
                	<div class="col-md-1">
                    	<label for="tipo_paciente" class="control-label">Tipo Paciente</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopaciente_id', $items, 1, ['class' => 'form-control input-sm','placeholder' => 'Seleccione','id'=>'tipopaciente_id']) }}                    
                	</div>
                	<div class="col-md-1">
                    	<label for="tipo_pago" class="control-label">Tipo Pago</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopago_id', ['1' => 'Normal', '2' => 'Mensual'], null, ['class' => 'form-control input-sm','id'=>'tipopago_id']) }}                    
                	</div>         	                	
                	<div class="col-md-1">
                    	<label for="fecha_entrega" class="control-label">Fecha de Entrega</label>
                    </div>
                    <div class="col-md-3">
                     	{!! Form::text('fecha_entrega', null, ['class' => 'form-control input-sm','placeholder' => 'Fecha de Entrega','id'=>'fecha_entrega']) !!}                    	                    
                	</div>                	
                </div>
                <div class="form-group row" id="entidad">                	                	
                </div>	
                <div class="form-group col-md-12">
                        <a href="" id="add" data-toggle="modal" class="btn btn-primary" style="float: right;" title="A&ntilde;adir" data-target="#myModal" data-backdrop="static">
                          	<span class="fa fa-plus" aria-hidden="true"></span>
                        </a>
                        <input type="hidden" name="examenesBand" id="examenesBand" value="0">
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
                            <div class="row">
	                    			<div class="col-md-10">
	                    				<label for="subtotal" class="control-label">SUBTOTAL</label>
	                    			</div>
	                    			<div class="col-md-2">
		                    			<label for="subtotal" class="control-label">
		                    				<span id="subtotal" name="subtotal">$0.00</span>
	    	                			</label>
	    	                		</div>		
                            </div>
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;" class="form-group">
                          <div class="row">
	                    			<div class="col-md-10">
	                    				<label for="descuento" class="control-label">DESCUENTO</label>
	                    			</div>
	                    			<div class="col-md-2">
	          							<input type="text" name="descuento" id="descuento" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)" value="0" >
	          						</div>   
                        </div>                 				
	                    		</td>	
	                    	</tr>	                    		                    		
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;padding-bottom:12px;">
                          <div class="row">
	                    			<div class="col-md-10">
	                    				<label for="total" class="control-label">TOTAL A PAGAR</label>
	                    			</div>
	                    			<div class="col-md-2">
	                    				<label for="total" class="control-label">
											<span id="total" name="total">$0.00</span>
										</label>
									</div>	</div>
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;" class="form-group">
                          <div class="row">
	                    			<div class="col-md-10">
	                    				<label for="total" class="control-label">ABONO</label>
	                    			</div>
	                    			<div class="col-md-2">	
	                    				<input type="text" name="abono" id="abono" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)" value="0">                							
									</div>		</div>							
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;padding-bottom:12px;">
                          <div class="row">
	                    			<div class="col-md-10">
	                    				<label for="pendiente" class="control-label">PENDIENTE A PAGAR</label>
	                    			</div>
	                    			<div class="col-md-2">
		                    			<label for="pendiente" class="control-label">
											<span id="pendiente" name="pendiente">$0.00</span>
										</label>
									</div>	</div>
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td colspan="2" style="width: 100%;text-align: right;">
	                    			<br>
	                    			<a href="{{ url('orden') }}" class="btn btn-info mr-2" style="float: right;">Cancelar</a> 
	                    			<button type="submit" class="btn btn-primary mr-2"  id="addDetalle">
                        		    	<span aria-hidden="true">Guardar</span>
                        			</button> &nbsp;

	                    		                  			
	                    		</td>
	                    	</tr>
	                    </table>

        		</div>        				
    	   	{!! Form::close() !!}
    	</div> 
      </div>
      </div>
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
   var url5 = '{!!URL::route('examenesEdit')!!}';
   var url6 = '{!!URL::route('entidades')!!}';
   var token = "{{ csrf_token() }}";
   var myArray = [];

  $('#myModal').on('show.bs.modal', function (evnt) {
   //$("#add").on("click",function() {
    var idsAux =[];
    var muestrasIds =[];
    $('input[name^="ids"]').each(function() {
      idsAux.push($(this).val());       
    });
      $('input[name^="muestras"]').each(function() {
        muestrasIds.push($(this).val());
    });
    var urlModal = url5 + "?ids="+JSON.stringify(idsAux)+"&muestrasIds="+JSON.stringify(muestrasIds);
    
    $('.modal-content').load(urlModal,function(result){     
    });

  });




</script>

<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/jquery.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/orden.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/orden.js') }}"></script>
<script src="{{ asset('/js/jquery.datetimepicker.full.min.js') }}"></script>


@endsection