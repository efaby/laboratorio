@extends('backLayout.app')
@section('title')
Tipoexaman
@stop

@section('content')

    <h1>Tipoexaman</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Nombre</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tipoexaman->id }}</td> <td> {{ $tipoexaman->nombre }} </td><td> {{ $tipoexaman->estado }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection