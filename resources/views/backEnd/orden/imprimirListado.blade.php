<div class="modal-header">     
    <h4 class="modal-title">Imprimir Exámen</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
</div>

<div class="panel-body">
    <hr/>
    	@if ($num_impresion >0 && (Auth::user()->authorizeMenu(['Analista'])))
	    	<div class="alert alert-warning" style="margin: 15px;">
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