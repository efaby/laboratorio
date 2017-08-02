@extends('backLayout.app')
@section('title')
Tipo de Exámen
@stop

@section('content')

    <h1>Tipo de Exámen <a href="{{ url('tipoexamen/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbltipoexamen">
            <thead>
                <tr>
                    <th></th><th>Id</th><th>Nombre</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tipoexamen as $item)
                <tr>
                	<td></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td width="20%">
                        <a href="{{ url('tipoexamen/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['tipoexamen', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('ELiminar', ['class' => 'btn btn-danger btn-xs']) !!}
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
        $('#tbltipoexamen').DataTable({
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