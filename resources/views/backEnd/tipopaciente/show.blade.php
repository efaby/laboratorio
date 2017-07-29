@extends('backLayout.app')
@section('title')
Tipopaciente
@stop

@section('content')

    <h1>Tipopaciente</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Nombre</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tipopaciente->id }}</td> <td> {{ $tipopaciente->nombre }} </td><td> {{ $tipopaciente->estado }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection