@extends('backLayout.app')
@section('title')
Orden
@stop

@section('content')

    <h1>Orden <a href="{{ url('orden/create') }}" class="btn btn-primary pull-right btn-sm">Añadir</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblexamen">
            <thead>
                <tr>
                    <th>Id</th><th>Paciente</th><th>Fecha</th><th>Subtotal</th><th>Descuento</th><th>Total</th><th>Abono</th><th>Fecha Entrega</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach($ordenes as $item)
                <tr>
                	<td>{{ $item->id }}</td>
                    <td>{{ $item->paciente->nombres }} {{ $item->paciente->apellidos }}</td>
                    <td>{{ $item->fecha_emision }}</a></td>
                    <td>{{ $item->subtotal }}</a></td>
                    <td>{{ $item->descuento }}</a></td>
                    <td>{{ $item->total }}</a></td>
                    <td>{{ $item->abono }}</a></td>
                    <td>{{ $item->fecha_entrega }}</a></td>
                     <!-- <td width="20%">
                       <a href="{{ url('orden/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['orden', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!} 
                    </td>-->
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