<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
    <h4 class="modal-title">Imprimir de Exámen</h4>
</div>

<div class="panel-body">
    <hr/>
    <div class="alert alert-warning fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            Excedi&oacute; el l&iacute;mite de impresi&oacute;n
        </div>
    
    <object data="{{ url('orden/ordenPdf/'.$id) }}" type="application/pdf" width="100%" height="600">
	 	<p>Your web browser doesn't have a PDF plugin.
	  		Instead you can <a href="{{ url('orden/ordenPdf/'.$id) }}">click here to
	  		download the PDF file.</a></p>
	</object>
</div>


