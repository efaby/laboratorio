@extends('backLayout.app')
@section('title')
Facturación Individual
@stop

@section('content')
<h3 class="page-heading mb-4">Facturación Individual </h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

    @if (Session::has('message'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblfac">
            <thead class="bg-primary">
                <tr>
                    <th></th>
                    <th>Paciente</th>
                    <th>Subtotal</th>
                    <th>Descuento</th>
                    <th>Por Cobrar</th>
                    <th>Abono</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Fecha Facturación</th>
                    <th style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach($ordenes as $item)
                <tr>
                    <td></td>
                	<td>{{ $item->paciente->nombres }} {{ $item->paciente->apellidos }}</td>
                    <td>${{ $item->subtotal }}</td>
                    <td>${{ $item->descuento }}</td>
                    <td>
                        @if ($item->factura_id == 0) 
                            ${{ number_format(($item->total - $item->abono),2)}}
                        @else
                            $0
                        @endif  
                    </td>
                    <td>${{ $item->abono }}</td>
                    <td>${{ $item->total }}</td>
                    <td style="text-align: center">
                        @if ($item->factura_id == 0) 
                            <label class="badge badge-danger">No Facturado</label>
                        @else
                            <label class="badge badge-success">Facturado</label>
                        @endif    
                    </td>

                    <td>{{ $item->fecha_emision }}</a></td>
                    <td style=" text-align: center;">
                        @if ($item->factura_id==0) 
                            <a href="{{ url('facturacion/editIndividual/' . $item->id ) }}" class="btn btn-warning btn-xs" title="Editar"><span class="fa fa-edit" aria-hidden="true" ></span></a> 
                        @else
                            <a href="{{ url('facturacion/imprimirIndividual/'.$item->factura_id)}}" onClick="window.open(this.href, this.target, 'width=750,height=450'); return false;" class="btn btn-warning btn-xs" title="Reemprimir"><span class="fa fa-edit" aria-hidden="true" ></span></a>                            
                        @endif                        
                         @if ($item->factura_id>0) 
                        <a href="javascript: verAnexos({{$item->factura_id}})" class="btn btn-success btn-xs" title="Ver Anexo" id="anexo"><span class="fa fa-list-alt" aria-hidden="true" ></span></a> 
                        @endif
                         
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
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
        return confirm("Está seguro que desea eliminar el item selccionado?");
    });

    function verAnexos(id) {
        var url3 = '{{ url('facturacion/anexoIndividual/') }}';
        window.open(url3 + "/" + id, 'popup', 'width=800,height=450');
    };
    
</script>
@endsection