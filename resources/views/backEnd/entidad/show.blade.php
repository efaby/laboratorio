@extends('backLayout.app')
@section('title')
Entidad
@stop

@section('content')

    <h1>Entidad</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Nombre</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $entidad->id }}</td> <td> {{ $entidad->nombre }} </td><td> {{ $entidad->estado }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection