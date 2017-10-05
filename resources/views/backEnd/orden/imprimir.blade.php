@extends('backLayout.app')
@section('title')
Imprimir Exámen
@stop

@section('content')

<div class="panel-body">
    <h1>Imprimir de Exámen</h1>
    <hr/>
    <div class="alert alert-warning fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            Excedi&oacute; el l&iacute;mite de impresi&oacute;n
        </div>
    <embed src="{{ url('orden/ordenPdf/'.$id) }}" type="application/pdf" width="100%" height="600">
    <hr />
    <a href="{{ url('orden/orden/' . $id ) }}" class="btn btn-info btn-sm">Salir</a>
</div>
@endsection


