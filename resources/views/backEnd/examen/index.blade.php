@extends('backLayout.app')
@section('title')
Exámen
@stop

@section('content')

    <h1>Exámen <a href="{{ url('examen/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblexamen">
            <thead>
                <tr>
                    <th></th><th>Id</th><th>Nombre</th><th>Tipo Examen</th><th>Muestra</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($examen as $item)
                <tr>
                	<td></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->tipoexaman->nombre }}</a></td>
                    <td>{{ $item->muestra->nombre }}</a></td>
                    <td width="20%">
                        <a href="{{ url('examen/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['examen', $item->id],
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
        $('#tblexamen').DataTable({
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