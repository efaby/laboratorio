@extends('backLayout.app')
@section('title')
Editar Exámen
@stop

@section('content')

<h3 class="page-heading mb-4">Editar Orden de Exámenes</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

            {!! Form::model($orden, [
        			'method' => 'PATCH',
        			'url' => ['orden', $orden->id],
        			'class' => 'form-horizontal',
        			'id'=>'frmItem'
    		]) !!}
               <div class="form-group row">               		
                  	<div class="col-md-1">
                		<label for="nombre_pacient" class="control-label">Paciente</label>
                	</div>	
                  	<div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="nombre_paciente1" placeholder="Paciente" value="{{ $paciente->apellidos }} {{ $paciente->nombres }}   " readonly>  
                    	<input type='hidden' id="id_paciente" name="id_paciente" class="form-control input-sm" value="{{ $paciente->id }}">                  	 
                  	</div>
                  	<div class="col-md-1">
               			<label for="mail" class="control-label">Dirección</label>
               		</div>	
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="direccion_paciente" name="direccion_paciente" 
                        placeholder="Dirección" value="{{ $paciente->direccion }}" readonly>
                    </div>
               		<div class="col-md-1">
                  		<label for="tel1" class="control-label">Teléfono</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="telefono_paciente" placeholder="Teléfono" value="{{ $paciente->telefono }}" readonly>
                    </div>
              </div>
              <div class="form-group row">               		
                    <div class="col-md-1">
                  		<label for="celular" class="control-label">Celular</label>
                  	</div>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="celular_paciente" placeholder="Celular" value="{{ $paciente->celular }}" readonly>
                    </div>               		
                    <div class="col-md-1">
                 		<label for="fecha_nacimiento" class="control-label">Edad</label>
                 	</div>	
                    <div class="form-group col-md-3" style="margin: 0px;">
                    	{!! Form::text('edad', $paciente->edad, ['class' => 'form-control input-sm', 'id' => 'edad', 'placeholder'=>'Ingrese la Edad del Paciente']) !!}                    	
                    </div>
                    <div class="col-md-1">
                 		<label for="fecha_nacimiento" class="control-label">M&eacute;dico</label>
                 	</div>	
                    <div class="form-group col-md-3" style="margin: 0px;">
                    	{!! Form::text('nombre_medico', $orden->nombre_medico, ['class' => 'form-control input-sm', 'id' => 'nombre_medico', 'placeholder'=>'Ingrese el nombre del Médico']) !!}                    	
                    </div>                    
                </div>
                <div class="form-group row">
                	<div class="col-md-1">
                    	<label for="tipo_paciente" class="control-label">Tipo Paciente</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopaciente_id', $items, $orden->tipopaciente_id, ['class' => 'form-control input-sm','placeholder' => 'Seleccione','id'=>'tipopaciente_id']) }}                    
                	</div>
                	<div class="col-md-1">
                    	<label for="tipo_pago" class="control-label">Tipo Pago</label>
                    </div>
                    <div class="col-md-3">
                     	{{ Form::select('tipopago_id', ['1' => 'Normal', '2' => 'Mensual'], $orden->tipopago_id, ['class' => 'form-control input-sm','id'=>'tipopago_id']) }}                    
                	</div>                    
                	<div class="col-md-1">
                    	<label for="fecha_entrega" class="control-label">Fecha de Entrega</label>
                    </div>
                    <div class="col-md-3">
                     	{!! Form::text('fecha_entrega', date_format(date_create($orden->fecha_entrega),"Y-m-d H:i") , ['class' => 'form-control input-sm','placeholder' => 'Fecha de Entrega','id'=>'fecha_entrega']) !!}                    	                    
                	</div>                	
                </div>
                <div class="form-group row" id="entidad">                	                	
                </div>
                <div class="form-group col-md-12">
                        <a href="" id="add" data-toggle="modal" class="btn btn-primary" style="float: right;" title="A&ntilde;adir" data-target="#myModal" data-backdrop="static">
                          	<span class="fa fa-plus" aria-hidden="true"></span>
                        </a>
                        <input type="hidden" name="examenesBand" id="examenesBand" value="<?php echo count($detalleorden); ?>">                         
                </div>
                <div >
                <div class="table table-responsive">
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
		                    <tbody id="tbodyExamenes">
		                    <?php $i = 1;  $disable = "";
		                    if(count($detalleorden)== 1) {
		                    	$disable = "disabled";
		                    }
		                    foreach ($detalleorden as $item) { ?>
			                    <tr>
			                	    <td>
			                	    	
		                	    		<div id="examen<?php echo $i; ?>" class="texto-span"><?php echo $item->examen; ?></div>
			                    	    
			                            <input type="hidden" id="ids<?php echo $i; ?>" name="ids[]" value="<?php echo $item->examen_id; ?>">
			                            <input type="hidden" id="muestras<?php echo $i; ?>" name="muestras[]" value="<?php echo $item->muestra_id; ?>">
			                            <input type="hidden" id="preciop<?php echo $i; ?>" name="preciop[]" class="preciop" value="<?php echo $item->precio_normal; ?>">
			                            <input type="hidden" id="preciol<?php echo $i; ?>" name="preciol[]" class="preciol" value="<?php echo $item->precio_laboratorio; ?>">
			                            <input type="hidden" id="precioc<?php echo $i; ?>" name="precioc[]" class="precioc" value="<?php echo $item->precio_clinica; ?>">         		    
			                    	</td>
			                    	<td>
			                            <div id="tipo<?php echo $i; ?>" class="texto-span"><?php echo $item->nombre; ?></div>                   		            
			                    	</td>
				                    <td>
			                            <div id="muestra<?php echo $i; ?>" class="texto-span"><?php echo $item->muestras; ?></div>
				                    </td>
				                    <td>
			                            <div id="precio<?php echo $i; ?>" class="texto-span"><?php echo $item->precio; ?></div>
				                    </td>
				                    <td>
				                        <button type="button" class="btn btn-danger btnDel btn-sm <?php echo $disable; ?>" id="eliminar<?php echo $i; ?>" onclick="removeDetalle(this)">
				                               <span class="fa fa-trash" aria-hidden="true"></span>
				                        </button>
				                    </td>
			                    </tr>
			                <?php $i++;} ?>
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
		                    				<span id="subtotal" name="subtotal">$<?php echo $orden->subtotal; ?></span>
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
	          							<input type="text" name="descuento" id="descuento" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)" value="<?php echo $orden->descuento; ?>">
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
											<span id="total" name="total">$<?php echo $orden->total; ?></span>
										</label>
									</div>
									</div>	
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="width: 100%;text-align: right;" class="form-group">
	                    		<div class="row">
	                    			<div class="col-md-10">
	                    				<label for="total" class="control-label">ABONO</label>
	                    			</div>
	                    			<div class="col-md-2">	
	                    				<input type="text" name="abono" id="abono" class="form-control input-sm" style="text-align:right;" placeholder="0.00" onkeypress="return numeroFloat(event, this)" value="<?php echo $orden->abono; ?>">                							
									</div>
									</div>									
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
											<span id="pendiente" name="pendiente">$<?php echo number_format(($orden->total - $orden->abono),2); ?></span>
										</label>
									</div>	
									</div>
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td colspan="2" style="width: 100%;text-align: right;padding-right:1px;">
	                    			<br>
	                    			<a href="{{ url('orden') }}" class="btn btn-secondary mr-2" style="float: right;">Cancelar</a> 
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
<link href="{{URL::asset('css/main.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/orden.js') }}"></script>
<script src="{{ asset('/js/jquery.datetimepicker.full.min.js') }}"></script>

<script src="{{ asset('/js/jquery.autocomplete.multiselect.js') }}"></script>

<script type="text/javascript">
	
	<?php if ($orden->tipopaciente_id > 1) { ?>
   		cargarEntidad(<?php echo $orden->tipopaciente_id; ?>,<?php echo $orden->entidad; ?>);
   	<?php } ?>

</script>

@endsection