@extends('backLayout.app')
@section('title')
Paciente
@stop

@section('content')

<h3 class="page-heading mb-4">Paciente </h3>
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
        <a href="{{ url('paciente/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a>
    </div>
    </div>

    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblpaciente">
            <thead class="bg-primary">
                <tr>
                    <th>Id</th><th>Cédula</th><th>Nombres</th><th>Apellidos</th><th>Edad</th><th>Celular</th><th style="width: 10%; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($paciente as $item)
                <tr>	
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->cedula }}</td>
                    <td>{{ $item->nombres }}</td>
                    <td>{{ $item->apellidos }}</td>                   
                    <td>{{ $item->edad }}</td>
                    <td>{{ $item->celular }}</td>
                    <td style="width: 10%; text-align: center;">
                        <a href="{{ url('paciente/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"><span class="fa fa-edit" aria-hidden="true"></span></a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['paciente', $item->id],
                            'style' => 'display:inline',
                            'class' => 'delete'
                        ]) !!}
                            {!! Form::button('<span class="fa fa-trash"></span>', array('class'=>'btn btn-danger btn-xs', 'type'=>'submit')) !!}
                        {!! Form::close() !!}
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
        $('#tblpaciente').DataTable({
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
</script>
@endsection