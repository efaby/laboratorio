@extends('backLayout.app')
@section('title')
Tipousuario
@stop

@section('content')

    <h1>Tipousuario</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Nombre</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tipousuario->id }}</td> <td> {{ $tipousuario->nombre }} </td><td> {{ $tipousuario->estado }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection