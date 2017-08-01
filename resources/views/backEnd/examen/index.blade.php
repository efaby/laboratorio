@extends('backLayout.app')
@section('title')
Examan
@stop

@section('content')

    <h1>Examen <a href="{{ url('examen/create') }}" class="btn btn-primary pull-right btn-sm">Add New Examan</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblexamen">
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Tipo Examen</th><th>Estado</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($examen as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('examen', $item->id) }}">{{ $item->nombre }}</a></td>
                    <td></a></td>
                    <td>{{ $item->estado }}</td>
                    <td>
                        <a href="{{ url('examen/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['examen', $item->id],
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