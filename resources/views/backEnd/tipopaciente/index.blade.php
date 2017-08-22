@extends('backLayout.app')
@section('title')
Tipo de Paciente
@stop

@section('content')

    <h1>Tipo de Paciente <a href="{{ url('tipopaciente/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbltipopaciente">
            <thead class="bg-primary">
                <tr>
                    <th></th><th>Id</th><th>Nombre</th><th style="width: 10%; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tipopaciente as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}
                    <td style="width: 10%; text-align: center;">
                        <a href="{{ url('tipopaciente/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['tipopaciente', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash"></span>', array('class'=>'btn btn-danger btn-xs', 'type'=>'submit')) !!}
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