@extends('backLayout.app')
@section('title')
Examan
@stop

@section('content')

    <h1>Examan</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Nombre</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $examan->id }}</td> <td> {{ $examan->nombre }} </td><td> {{ $examan->estado }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection