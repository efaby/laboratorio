<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
    <h4 class="modal-title">Listado de Examenes</h4>
</div>
<div class="modal-body" >
	<div class="row">
		<div class="col-sm-3">
            <?php $cont = 1; $tipo = ""; ?>
            @foreach($examenes as $item) 
                @if ( $tipo != $item->tipoexamens_id ) 
                    <h5><b>{{ $item->tipoexaman->nombre }}</b></h5>
                    <?php $tipo = $item->tipoexamens_id; ?> 
                @endif              
                <p>
                {!! Form::checkbox('examen[]', $item->id); !!}
                {{ $item->nombre }}
                </p>
                @if ( $cont == $limit ) 
                    </div>
                    <div class="col-sm-3">
                    <?php $cont = 0; ?>
                @endif
                <?php $cont ++; ?>
            @endforeach
        </div>
	</div>	    	
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary" id="btnAgregar" >Agregar</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
</div>

<script type="text/javascript">
    
    $(document).ready(function() {
         $("#btnAgregar").click(function() {
            var checked = []
            $("input[name='examen[]']:checked").each(function ()
            {
                checked.push(parseInt($(this).val()));
            });
            $('#myModal').modal('hide');
            agregar(checked);
        });



          $("input:checkbox").each(function () {
            var iid = $(this).attr("value");
            this.checked = false
            if (myArray.indexOf(iid) != -1) this.checked = true
        });
    });
</script>