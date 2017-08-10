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
                	<label for="cedula_paciente" class="col-md-1 control-label">Cédula</label>
                  	<div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="cedula_paciente" placeholder="Selecciona una cédula" required>
                      	<input id="id_paciente" type='hidden'> 
                  	</div>
                	<label for="nombre_paciente" class="col-md-1 control-label">Paciente</label>
                  	<div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="nombre_paciente" placeholder="Paciente" readonly>                      	 
                  	</div>
                  	<label for="tel1" class="col-md-1 control-label">Teléfono</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" readonly>
                    </div>
                    
                 </div>
               <div class="form-group row">
               		<label for="mail" class="col-md-1 control-label">Email</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly>
                    </div>
                 	<label for="tel2" class="col-md-1 control-label">Fecha</label>
                    <div class="col-md-2">
                    	<input type="text" class="form-control input-sm" id="fecha"  readonly>
                     </div>
                     <label for="email" class="col-md-1 control-label">Pago</label>
                     <div class="col-md-3">
                     	<select class='form-control input-sm' id="condiciones">
                        	<option value="1">Efectivo</option>
                            <option value="2">Cheque</option>
                            <option value="3">Transferencia bancaria</option>
                            <option value="4">Crédito</option>
                     	</select>
                	</div>
               	</div>
                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                            Agregar productos
                        </button>
                    </div>  
                </div>
            </form> 
            
        <div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->          
        </div>
    </div>      
          <div class="row-fluid">
            <div class="col-md-12">           
    

            
            </div>  
         </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
                        </div>
                        <button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
                      </div>
                    </form>
                    <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
                    <div class="outer_div" ></div><!-- Datos ajax Final -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    
                  </div>
                </div>
              </div>
            </div>
    

@endsection

@section('scripts')
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#cedula_paciente").autocomplete({
			source : '{!!URL::route('autocomplete')!!}',
			minLength: 2,
			select: function(event, ui) {
				event.preventDefault();
				console.log(ui);
				$('#id_cliente').val(ui.id);
				$('#nombre_paciente').val(ui.nombres);
				$('#tel1').val(ui.item.telefono_cliente);
				$('#mail').val(ui.item.email_cliente);
			 }
		});
	});	
</script>
@endsection
