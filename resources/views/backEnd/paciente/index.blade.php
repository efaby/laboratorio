@extends('backLayout.app')
@section('title')
Paciente
@stop

@section('content')

    <h1>Paciente <a href="{{ url('paciente/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblpaciente">
            <thead>
                <tr>
                    <th></th><th>Id</th><th>Cédula</th><th>Nombres</th><th>Apellidos</th><th>Tipo</th><th>Teléfono</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($paciente as $item)
                <tr>
                 	<td></td>	
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->cedula }}</td>
                    <td>{{ $item->nombres }}</td>
                    <td>{{ $item->apellidos }}</td>
                    <td>{{ $item->tipopaciente->nombre }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>
                        <a href="{{ url('paciente/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['paciente', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
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
        $('#tblpaciente').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection