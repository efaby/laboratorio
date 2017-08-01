@extends('backLayout.app')
@section('title')
Paciente
@stop

@section('content')

    <h1>Paciente <a href="{{ url('paciente/create') }}" class="btn btn-primary pull-right btn-sm">Add New Paciente</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblpaciente">
            <thead>
                <tr>
                    <th>ID</th><th>Cedula</th><th>Nombres</th><th>Apellidos</th><th>Tipo</th><th>Telefono</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($paciente as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('paciente', $item->id) }}">{{ $item->cedula }}</a></td><td>{{ $item->nombres }}</td><td>{{ $item->apellidos }}</td><td>{{ $item->tipopaciente->nombre }}</td><td>{{ $item->telefono }}</td>
                    <td>
                        <a href="{{ url('paciente/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['paciente', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
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