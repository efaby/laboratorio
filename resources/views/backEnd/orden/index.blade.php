@extends('backLayout.app')
@section('title')
Orden
@stop

@section('content')



    <h3 class="page-heading mb-4">Orden</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">


            @if (Session::has('message'))
                <div class="alert alert-{{ Session::get('status') }}">
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
                            <th></th><th>Id</th><th>Paciente</th><th>Codigo</th><th>Fecha Emisión</th><th>Fecha Entrega</th><th>Estado</th><th style="width: 20%; text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($ordenes as $item)
                        <tr>
                         	<th></th>
                        	<td>{{ $item->id }}</td>
                            <td>{{ $item->paciente->nombres }} {{ $item->paciente->apellidos }}</td>
                            <td>{{ $item->codigo }}</td>
                            <td>{{ $item->fecha_emision }}</td>
                                      
                            <td>{{ $item->fecha_entrega }}</td>
                            <td style="text-align: center">
                                @if ($item->validado == 0) 
                                    <label class="badge badge-warning">No Validado</label>
                                @else
                                    <label class="badge badge-success">Validado</label>
                                @endif    
                            </td>
                            <td style="width: 20%; text-align: center;">
                            	@if (Auth::user()->authorizeMenu(['Administrador','Analista','Secretaria']))
        	                        @if ($item->atendido==0) 
        	                            <a href="{{ url('orden/' . $item->id . '/edit') }}" class="btn btn-warning btn-xs" title="Editar"><span class="fa fa-edit" aria-hidden="true" ></span></a> 
        	                        @else
        	                            <a href="#" class="btn btn-warning btn-xs disabled" title="Editar"><span class="fa fa-edit" aria-hidden="true" ></span></a>                            
        	                        @endif
        	                    @endif    
                                <a href="#" data-toggle="modal" class="btn btn-info btn-xs" title="Generar Código" data-target="#myModal" data-id="{{ $item->id }}">
                                  	<span class="fa fa-qrcode" aria-hidden="true" ></span>
                                </a>
                                    @if ($item->validado==0)
                                      	@if (Auth::user()->authorizeMenu(['Administrador','Analista'])) 
        	                            	<a href="{{ url('orden/orden/' . $item->id ) }}" class="btn btn-success btn-xs" title="Atender"><span class="fa fa-list-alt" aria-hidden="true" ></span></a>
        	                          	@endif   
        	                        @else
        	                        	@if (Auth::user()->authorizeMenu(['Administrador','Analista']))
        	                            	<a href="#" class="btn btn-success btn-xs disabled" title="Atender"><span class="fa fa-list-alt" aria-hidden="true" ></span></a>
        	                            @endif
        	                            @if (Auth::user()->authorizeMenu(['Administrador','Analista']))
        	                            	<a href="#" data-toggle="modal" class="btn btn-info btn-xs" title="Imprimir" data-target="#myModal1" data-backdrop="static" data-id="{{ $item->id }}" >
        	                            		<span class="fa fa-print" aria-hidden="true" ></span>
        	                        		</a>
        	                        	@endif
        	                        @endif   
        						
        						   
                                @if ($item->atendido==0)                          
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['orden', $item->id],
                                    'style' => 'display:inline',
                                    'class' => 'delete',
                                    'title' => 'Eliminar'
                                ]) !!}
                                    {!! Form::button('<span class="fa fa-trash"></span>', array('class'=>'btn btn-danger btn-xs', 'type'=>'submit')) !!}
                                {!! Form::close() !!}
                                @else
        	                        @if (Auth::user()->authorizeMenu(['Administrador']))
        	                            <a href="{{ url('orden/validar/' . $item->id ) }}" class="btn btn-warning btn-xs" title="Validar"><span class="fa fa-list-alt" aria-hidden="true" ></span></a>
        	                        @endif    
                                    <a href="#" class="btn btn-danger btn-xs disabled" title="Eliminar"><span class="fa fa-trash" aria-hidden="true" ></span></a>
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

</div>	

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog" style="width: 30%;" >
                    <div class="modal-content" >
                        <div class="modal-header">
                        </div>
                    </div>
                </div>  
            </div>

            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content modal-content1">
                        <div class="modal-header">
                        </div>
                    </div>
                </div>  
            </div> 
@endsection

@section('scripts')
<script src="{{ asset('/js/jquery.PrintArea.js') }}"></script>
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
        return confirm("Está seguro que desea eliminar la orden selccionada?");
    });

    $(document.body).on('hidden.bs.modal', function () {
        $('#myModal1').removeData('bs.modal')
    });

    
$('.modal').on('hidden', function() { console.log("hidden"); $(this).removeData(); })

    var url = '{{ url('orden/generarCodigo') }}';
    $('#myModal').on('show.bs.modal', function (event) {    
        var button = $(event.relatedTarget) 
        console.log("button", button);
        var id = button.data('id')   
        $('.modal-content').load(url + '/' + id,function(result){     
        });
    });

    var url1 = '{{ url('orden/imprimirListado') }}';
    $('#myModal1').on('show.bs.modal', function (event) {  
        var button = $(event.relatedTarget) 
        console.log("button", button);
        var id = button.data('id')      
        $('.modal-content1').load(url1  + '/' + id,function(result){     
        });
    });

</script>
<style type="text/css">
    
    .modal-dialog{
       width: 60%;
       margin: auto;
    }

</style>
@endsection