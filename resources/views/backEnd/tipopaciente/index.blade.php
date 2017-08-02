@extends('backLayout.app')
@section('title')
Tipo de Paciente
@stop

@section('content')

    <h1>Tipo de Paciente <a href="{{ url('tipopaciente/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbltipopaciente">
            <thead>
                <tr>
                    <th></th><th>Id</th><th>Nombre</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tipopaciente as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}
                    <td width="20%">
                        <a href="{{ url('tipopaciente/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['tipopaciente', $item->id],
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
        $('#tbltipopaciente').DataTable({
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