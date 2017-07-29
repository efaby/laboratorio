@extends('backLayout.app')
@section('title')
Muestra
@stop

@section('content')

    <h1>Muestra</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Nombre</th><th>Descripcion</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $muestra->id }}</td> <td> {{ $muestra->nombre }} </td><td> {{ $muestra->descripcion }} </td><td> {{ $muestra->estado }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection