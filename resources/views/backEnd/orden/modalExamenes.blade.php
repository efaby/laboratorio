<form id="frmOrden">  
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
    <h4 class="modal-title">Listado de Examenes</h4>
</div>
<div class="modal-body" >
     
	<div class="row">
		<div class="col-sm-3">
            <?php $cont = 1; $tipo = ""; ?>
            @foreach($examenes as $item) 
                @if ( $tipo != $item->tipoexamens_id) 
                    <h5><b>{{ $item->tipoexaman->nombre }}</b></h5>
                    <?php $tipo = $item->tipoexamens_id; ?> 
                    <div class="form-group">
                    {!! Form::text('txtmuestra_'.$item->tipoexaman->id, null, ['class' => 'form-control','id'=>'muestra', 'data-id' => $item->tipoexaman->id]) !!}
                    {!! Form::hidden('muestra_'.$item->tipoexaman->id, 0, ['class' => 'form-control','id'=>'muestra_'.$item->tipoexaman->id]) !!}
                    </div>              
                @endif              
                <p>
                {!! Form::checkbox('examen_' .$item->tipoexaman->id. '[]', $item->id); !!}
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
</form> 
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


        $('#frmOrden')
        .formValidation({
            message: 'This value is not valid',
            fields: {
                txtmuestra_1: {
                    validators: {
                        callback: {
                            message: 'Ingrese la muestra',
                            callback: function(value, validator, $field) {
                                var options = $('#frmOrden').find('[name="examen_1[]"]:checked').val();
                                if (typeof options === 'undefined') {
                                    $('#frmOrden').find('[name="muestra_1"]').val(0);
                                    $('#frmOrden').find('[name="txtmuestra_1"]').val('');
                                    
                                } else {
                                    if (value !== '') {
                                        var muestra = $('#frmOrden').find('[name="muestra_1"]').val();
                                        console.log("muestra", muestra);
                                        if (muestra !== '0') {
                                             console.log("regrsa true");
                                            return true
                                        } else {
                                            console.log("regrsa false");
                                            return false;
                                        }
                                    } else {
                                         console.log("regrsa false other");
                                        return false;
                                    }
                                } 
                            }
                        }
                    }
                }
            }
        })
        .on('change', '[name="examen_1[]"]', function(e) {
            console.log("entro");
            $('#frmOrden').formValidation('revalidateField', 'txtmuestra_1');
        })
        .on('success.field.fv', function(e, data) {
            if (data.field === 'otherChannel') {
                var channel = $('#surveyForm').find('[name="channel"]:checked').val();
                // User choose given channel
                if (channel !== 'other') {
                    // Remove the success class from the container
                    data.element.closest('.form-group').removeClass('has-success');

                    // Hide the tick icon
                    data.element.data('fv.icon').hide();
                }
            }
        });


    });
</script>