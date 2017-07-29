@extends('backLayout.app')
@section('title')
Tipopaciente
@stop

@section('content')

    <h1>Tipopaciente <a href="{{ url('tipopaciente/create') }}" class="btn btn-primary pull-right btn-sm">Add New Tipopaciente</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbltipopaciente">
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Estado</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tipopaciente as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('tipopaciente', $item->id) }}">{{ $item->nombre }}</a></td><td>{{ $item->estado }}</td>
                    <td>
                        <a href="{{ url('tipopaciente/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['tipopaciente', $item->id],
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