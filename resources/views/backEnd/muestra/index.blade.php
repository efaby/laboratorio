@extends('backLayout.app')
@section('title')
Muestra
@stop

@section('content')

    <h1>Muestra <a href="{{ url('muestra/create') }}" class="btn btn-primary pull-right btn-sm">Add New Muestra</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblmuestra">
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Descripcion</th><th>Estado</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($muestra as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('muestra', $item->id) }}">{{ $item->nombre }}</a></td><td>{{ $item->descripcion }}</td><td>{{ $item->estado }}</td>
                    <td>
                        <a href="{{ url('muestra/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['muestra', $item->id],
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