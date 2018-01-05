@extends('backLayout.app')
@section('title')
Facturación Global
@stop

@section('content')

    <h1>Facturación Global</h1>
    @if (Session::has('message'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif

     <div class="row" style="margin-bottom: 10px;" > 
        <div class="col-sm-12">
            <a href="{{ url('facturacion/global') }}" class="btn btn-primary pull-right btn-sm">Nueva</a>
        </div>
    </div>

    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblfac">
            <thead class="bg-primary">
                <tr>
                    <th></th><th>Id</th><th>Cliente</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Fecha Facturación</th><th>Total</th><th style="width: 20%; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach($facturas as $item)
                <tr>
                 	<th></th>
                	<td>{{ $item->id }}</td>
                    <td>{{ $item->cliente->nombres }} {{ $item->cliente->apellidos }}</td>
                    <td>${{ $item->fecha_inicio }}</a></td>
                    <td>${{ $item->fecha_fin }}</a></td>
                    <td>${{ $item->fecha_factura }}</td>
                    <td>${{ $item->precio }}</a></td>
                    <td style="width: 20%; text-align: center;">

                        <a href="javascript: imprimir({{$item->id}})" class="btn btn-warning btn-xs" title="Re Imprimir"><span class="glyphicon glyphicon-edit" aria-hidden="true" ></span></a>
                        <a href="javascript: verAnexos({{$item->id}})" class="btn btn-success btn-xs" title="Ver Anexo" id="anexo"  ><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span></a> 
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
        return confirm("Está seguro que desea eliminar el item seleccionado?");
    });
    
    function imprimir(id) {
        var url3 = '{{ url('facturacion/imprimirGlobal/') }}';
        window.open(url3 + "/" + id, 'popup', 'width=800,height=450');
    };

    function verAnexos(id) {
        var url3 = '{{ url('facturacion/anexoGlobal/') }}';
        window.open(url3 + "/" + id, 'popup', 'width=800,height=450');
    };


</script>
@endsection