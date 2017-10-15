<div class="modal-header">
    <a href="{{ url('orden/updatePage') }}" aria-hidden="true" class="close" title="Cerrar">
    	&times;
    </a>    
    <h4 class="modal-title">Generación de Código de Orden</h4>
</div>
<div class="modal-body" style="text-align: center">
	<div class="form-group row" style="padding-left:200px">
		<div style="border: 1px solid #292626;border-width:1px;width:178px">
			<h1>{{$codigo}}</h1>
		</div>
	</div>	    	
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Enviar Correo</button>
    <a href="{{ url('orden/updatePage') }}" class="btn btn-default" title="Cerrar">
    	Cerrar
    </a>        
</div>