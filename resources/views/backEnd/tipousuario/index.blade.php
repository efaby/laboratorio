@extends('backLayout.app')
@section('title')
Tipousuario
@stop

@section('content')

    <h1>Tipo de Usuario <a href="{{ url('tipousuario/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbltipousuario">
            <thead>
                <tr>
                    <th></th><th>Id</th><th>Nombre</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tipousuario as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>
                        <a href="{{ url('tipousuario/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['tipousuario', $item->id],
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
        $('#tbltipousuario').DataTable({
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