@extends('backLayout.app')
@section('title')
Orden
@stop

@section('content')

    <h1>Orden</h1>

    @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('status') }} fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="row" style="margin-bottom: 10px;" > 
    <div class="col-sm-12">
        <a href="{{ url('orden/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a>
    </div>
    </div>

    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblexamen">
            <thead class="bg-primary">
                <tr>
                    <th></th><th>Id</th><th>Paciente</th><th>Fecha Emisión</th><th>Subtotal</th><th>Descuento</th><th>Total</th><th>Abono</th><th>Fecha Entrega</th><th style="width: 20%; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach($ordenes as $item)
                <tr>
                 	<th></th>
                	<td>{{ $item->id }}</td>
                    <td>{{ $item->paciente->nombres }} {{ $item->paciente->apellidos }}</td>
                    <td>{{ $item->fecha_emision }}</td>
                    <td>${{ $item->subtotal }}</td>
                    <td>${{ $item->descuento }}</td>
                    <td>${{ $item->total }}</td>
                    <td>${{ $item->abono }}</td>
                    <td>{{ $item->fecha_entrega }}</td>
                    <td style="width: 20%; text-align: center;">
                        @if ($item->atendido==0) 
                            <a href="{{ url('orden/' . $item->id . '/edit') }}" class="btn btn-warning btn-xs" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true" ></span></a> 
                        @else
                            <a href="#" class="btn btn-warning btn-xs disabled" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true" ></span></a>                            
                        @endif
                        <a href="{{ url('orden/generarCodigo/' . $item->id) }}" data-toggle="modal" class="btn btn-info btn-xs" title="Generar Código" data-target="#myModal">
                          	<span class="glyphicon glyphicon-qrcode" aria-hidden="true" ></span>
                        </a>
                        @if ($item->validado==0) 
                            <a href="{{ url('orden/orden/' . $item->id ) }}" class="btn btn-success btn-xs" title="Atender"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span></a> 
                        @else
                            <a href="#" class="btn btn-success btn-xs disabled" title="Atender"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span></a>

                        @endif   

                        @if ($item->atendido==0) 
                         
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['orden', $item->id],
                            'style' => 'display:inline',
                            'class' => 'delete',
                            'title' => 'Eliminar'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash"></span>', array('class'=>'btn btn-danger btn-xs', 'type'=>'submit')) !!}
                        {!! Form::close() !!}
                        @else
                            <a href="{{ url('orden/validar/' . $item->id ) }}" class="btn btn-warning btn-xs" title="Validar"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span></a>
                            <a href="#" class="btn btn-danger btn-xs disabled" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></a> 

                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog" >
			<div class="modal-content">
				<div class="modal-header">
				</div>
			</div>
		</div>	
	</div>
</div>	
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tblexamen').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
            "language":{
                "lengthMenu":"Mostrar _MENU_ registros por página.",
                "zeroRecords": "Lo sentimos. No se encontraron registros.",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros aún.",
                    "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                    "search" : "Búsqueda",
                    "LoadingRecords": "Cargando ...",
                    "Processing": "Procesando...",
                    "SearchPlaceholder": "Comience a teclear...",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente", 
                        }
                },
            "lengthChange": false,
            info: false
        });
    });

    $(".delete").on("submit", function(){
        return confirm("Esta seguro que desea eliminar la orden selccionada?");
    });
</script>
@endsection