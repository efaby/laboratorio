@extends('backLayout.app')
@section('title')
Paciente
@stop

@section('content')

    <h1>Paciente</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Cedula</th><th>Nombres</th><th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $paciente->id }}</td> <td> {{ $paciente->cedula }} </td><td> {{ $paciente->nombres }} </td><td> {{ $paciente->apellidos }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection