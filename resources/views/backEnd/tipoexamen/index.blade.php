@extends('backLayout.app')
@section('title')
Tipoexaman
@stop

@section('content')

    <h1>Tipoexamen <a href="{{ url('tipoexamen/create') }}" class="btn btn-primary pull-right btn-sm">Add New Tipoexaman</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbltipoexamen">
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Estado</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tipoexamen as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('tipoexamen', $item->id) }}">{{ $item->nombre }}</a></td><td>{{ $item->estado }}</td>
                    <td>
                        <a href="{{ url('tipoexamen/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['tipoexamen', $item->id],
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