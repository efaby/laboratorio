@extends('backLayout.app')
@section('title')
Facturación Individual
@stop

@section('content')

    <h1>Facturación Individual</h1>
    @if (Session::has('message'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblfac">
            <thead class="bg-primary">
                <tr>
                    <th></th><th>Id</th><th>Paciente</th><th>Subtotal</th><th>Descuento</th><th>Abono</th><th>Total</th><th>Fecha Facturación</th><th style="width: 20%; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach($ordenes as $item)
                <tr>
                 	<th></th>
                	<td>{{ $item->id }}</td>
                    <td>{{ $item->paciente->nombres }} {{ $item->paciente->apellidos }}</td>
                    <td>${{ $item->subtotal }}</a></td>
                    <td>${{ $item->descuento }}</a></td>
                    <td>${{ $item->abono }}</td>
                    <td>${{ $item->total }}</a></td>
                    <td>{{ $item->fecha_emision }}</a></td>
                    <td style="width: 20%; text-align: center;">
                        @if ($item->factura_id==0) 
                            <a href="{{ url('facturacion/editIndividual/' . $item->id ) }}" class="btn btn-warning btn-xs" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true" ></span></a> 
                        @else
                            <a href="#" class="btn btn-warning btn-xs disabled" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true" ></span></a>                            
                        @endif                        
                         @if ($item->factura_id>0) 
                        <a href="{{ url('facturacion/verIndividual/' . $item->id ) }}" class="btn btn-success btn-xs" title="ver"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span></a> 
                        @endif
                         
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tblfac').DataTable({
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
        return confirm("Esta seguro que desea eliminar el item selccionado?");
    });
    
</script>
@endsection