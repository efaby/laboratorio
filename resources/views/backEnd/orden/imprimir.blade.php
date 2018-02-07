@extends('backLayout.app')
@section('title')
Imprimir Exámen
@stop

@section('content')
<h3 class="page-heading mb-4">Imprimir Exámen</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <a href="{{ url('orden/orden/' . $id ) }}" class="btn btn-info mr-2">Salir</a>                                                      
                         </div>
                    </div>
               </div>

    
   	<br><br>
    @if ($num_impresion >0 && (Auth::user()->authorizeMenu(['Analista'])))
    	<div class="alert alert-warning fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            Excedi&oacute; el l&iacute;mite de impresi&oacute;n
        </div>
    @endif    
    @if (($num_impresion == 0 && (Auth::user()->authorizeMenu(['Analista']))) || 
    		(Auth::user()->authorizeMenu(['Administrador'])))
    <object data="{{ url('orden/ordenPdf/'.$id) }}" type="application/pdf" width="100%" height="600">
	 	<p>Your web browser doesn't have a PDF plugin.
	  		Instead you can <a href="{{ url('orden/ordenPdf/'.$id) }}">click here to
	  		download the PDF file.</a></p>
	</object>
	@endif  
   
</div>
</div>
</div></div>
@endsection


