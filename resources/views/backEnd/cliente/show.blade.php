@extends('backLayout.app')
@section('title')
Cliente
@stop

@section('content')

    <h1>Cliente</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Cedula</th><th>Nombres</th><th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cliente->id }}</td> <td> {{ $cliente->cedula }} </td><td> {{ $cliente->nombres }} </td><td> {{ $cliente->apellidos }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection