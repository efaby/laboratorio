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
                	<label for="cedula_pacient" class="col-md-1 control-label">Cédula</label>
                  	<div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="cedula_paciente" placeholder="Ingrese una cédula" required>
                      	<input id="id_paciente" type='hidden'> 
                  	</div>
                	<label for="nombre_pacient" class="col-md-1 control-label">Paciente</label>
                  	<div class="col-md-3">
                    	<input type="text" class="form-control input-sm" id="nombre_paciente" placeholder="Paciente" readonly>                      	 
                  	</div>
                  	<label for="tel1" class="col-md-1 control-label">Teléfono</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" readonly>
                    </div>
                    
                 </div>
               <div class="form-group row">
               		<label for="mail" class="col-md-1 control-label">Direccion</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="direccion" placeholder="Direccion" readonly>
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
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="agregar">
                            Agregar productos
                        </button>
                    </div>  
                </div>
            </form> 
            
        <div class="form-group col-xs-12">

                        <button type="button" class="btn btn-primary" style="float: right;" ng-click="addDetalle()" ng-disabled="impreso">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                   </div>
                   <div class="form-group col-xs-12">
                    <table class="table table-responsive table-striped table-hover table-condensed">
                    <thead class="bg-primary">
                    <tr>
                        <th>Examen</th>
                        <th>Tipo</th>
                        <th>Muestra</th>
                        <th>Precio</th>
                        <th style="width: 5%;">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>
                        <input type="text" class="form-control input-sm" id="examen" placeholder="Examen" required>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-danger">
                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </td>
                    </tr>
                    </tbody>
                    </table>
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
                          <input type="text" class="form-control" id="buscar" placeholder="Buscar productos" >
                        </div>
                        <button type="button" class="btn btn-default" id="buscarBtn"> Buscar</button>
                      </div>
                    </form>
                    <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
                    <div class="outer_div" >
                        
                        <table id="productos" class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>team</th>
                            </tr>
                             </thead>
                        <tbody>
                        </tbody>
                        </table>
                    </div><!-- Datos ajax Final -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    
                  </div>
                </div>
              </div>
            </div>
    

@endsection

@section('scripts')

<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {
        var table = $('#productos').DataTable({
                        "info": false,
                        "lengthChange": false,
                        "dom": 'lrtip'
                    });
		$("#cedula_paciente").autocomplete({
			source : '{!!URL::route('autocomplete')!!}',
			minLength: 2,
			select: function(event, ui) {
				event.preventDefault();
				$('#id_cliente').val(ui.item.id);
				$('#nombre_paciente').val(ui.item.value);
				$('#tel1').val(ui.item.telefono);
				$('#direccion').val(ui.item.direccion);
                $("#cedula_paciente").val(ui.item.cedula);
			 }
		});

        $('#agregar').click(function(){
        var url = '{!!URL::route('examenes')!!}';

        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data) {
                table.clear();   
                table.search('').draw();  
                $('#buscar').val('');        
                data.forEach(function(item) {
                    table.row.add([ item.nombre, item.precio, item.precio_especial ]).draw();;
                })
            }
        });
    });

        $('#buscar').on( 'keyup', function () {
            table.search( this.value ).draw();
        });

        $('#buscarBtn').on( 'click', function () {
            table.search( $('#buscar').val() ).draw();
        });

	});	
</script>
@endsection
