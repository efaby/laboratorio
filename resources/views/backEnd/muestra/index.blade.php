@extends('backLayout.app')
@section('title')
Muestra
@stop

@section('content')

    <h1>Muestra <a href="{{ url('muestra/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblmuestra">
            <thead>
                <tr>
                    <th></th><th>Id</th><th>Nombre</th><th>Descripción</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($muestra as $item)
                <tr>
                	<td></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td><td>{{ $item->descripcion }}</td>
                    <td width="20%">
                        <a href="{{ url('muestra/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['muestra', $item->id],
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
        $('#tblmuestra').DataTable({
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