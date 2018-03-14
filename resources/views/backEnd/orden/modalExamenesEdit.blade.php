<div id="mostrarVentana">
<div class="modal-header">  
    <h4 class="modal-title">Listado de Examenes</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body" >
     <form id="frmOrden"> 
	<div class="row">
		<div class="col-sm-3">
            <?php $cont = 1; $tipo = ""; ?>

            @foreach($examenes as $item) 
           
                @if ( $tipo != $item->tipoexamens_id) 
                    <h5><b>{{ $item->tipoexaman->nombre }}</b></h5>
                    <?php $tipo = $item->tipoexamens_id; ?> 
                    <div class="form-group">
                    {!! Form::text('txtmuestra_'.$item->tipoexaman->id, null, ['class' => 'form-control','id'=>'muestra', 'data-id' => $item->tipoexaman->id , 'data-value' => (isset($muestras[$item->tipoexaman->id]['nombres'])) ? $muestras[$item->tipoexaman->id]['nombres']: null, 'data-ids' => (isset($muestras[$item->tipoexaman->id]['ids'])) ? $muestras[$item->tipoexaman->id]['ids']: null]) !!}
                    {!! Form::hidden('muestra_'.$item->tipoexaman->id, (isset($muestras[$item->tipoexaman->id]['ids']))? $muestras[$item->tipoexaman->id]['ids'] : 0, ['class' => 'form-control','id'=>'muestra_'.$item->tipoexaman->id]) !!}
                    </div>              
                @endif              
                <div class="row">   
                    <div class="col-md-1">             
                	{!! Form::checkbox('examen_' .$item->tipoexaman->id. '[]',$item->id,$item->marca==1?true:false, ['style' => 'min-height: auto;', 'id'=>'examen_'.$item->id] ); !!}
                    </div>
                    <div class="col-md-10">
                	<label for="examen_{{$item->id}}">{{ $item->nombre }} </label> 
                    </div>
                </div>
                @if ( $cont == $limit ) 
                    </div>
                    <div class="col-sm-3">
                    <?php $cont = 0; ?>
                @endif
                <?php $cont ++; ?>
            @endforeach            
        </div>
	</div>
       </form> 	
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary disabled" id="btnAgregar" >Agregar</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>      
</div>
</div>
<script type="text/javascript">		    
    $(document).ready(function() {
        var idsTE = [];
        
        @foreach($tipos as $item) 
            idsTE.push(parseInt({{$item->id}}));
          //  $("input[name='txtmuestra_{{$item->id}}']").trigger('keyup');
        @endforeach

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
        });


         $("#btnAgregar").click(function() {
            if (!$(this).hasClass('disabled')) {
                var checked = [];
                var muestras = [];
                idsTE.forEach(function (item){
                    $("input[name='examen_" + item + "[]']:checked").each(function (){                    
                        checked.push(parseInt(this.value));
                        muestras.push(($('#muestra_' + item).val()));
                    });
                });            
                $('#myModal').modal('hide');
                agregar(checked,muestras);
                $('#frmOrden').trigger("reset");
            }
        });

        /*  $("input:checkbox").each(function () {
            var iid = $(this).attr("value");
            this.checked = false
            if (myArray.indexOf(iid) != -1) this.checked = true
        });*/


        $('#frmOrden')
        .formValidation({
            message: 'This value is not valid',
            fields: {
            @foreach($tipos as $item) 
                txtmuestra_{{$item->id}}: {
                    validators: {
                        callback: {
                            message: 'Ingrese la muestra',
                            callback: function(value, validator, $field) {
                                console.log("revalida", examen_{{$item->id}} );
                                var options = $('#frmOrden').find('[name="examen_{{$item->id}}[]"]:checked').val();
                                if (typeof options === 'undefined') {  
                                    $("#btnAgregar").removeClass( "disabled");                                  
                                    return true;
                                } else {
                                    if (value !== '') {
                                        var muestra = $('#frmOrden').find('[name="muestra_{{$item->id}}"]').val();
                                        if (muestra !== '0') { 
                                            $("#btnAgregar").removeClass( "disabled");                                             
                                            return true;
                                        } else {   
                                            $("#btnAgregar").addClass("disabled");                                          
                                            return false;
                                        }
                                    } else {  
                                        var v = $( "#muestra_{{$item->id}}").val();
                                        console.log("value",v);
                                        if( v > 0  ) {
                                            $("#btnAgregar").removeClass( "disabled" ); 
                                            return true;
                                        }   
                                        $("#btnAgregar").addClass("disabled");                                   
                                        return false;
                                    }
                                } 
                            }
                        }
                    }
                },
            @endforeach
            }
        })
        @foreach($tipos as $item) 
        .on('change', '[name="examen_{{$item->id}}[]"]', function(e) {
            $('#frmOrden').formValidation('revalidateField', 'txtmuestra_{{$item->id}}');
        })

        .on('success.field.fv', function(e, data) {
            if (data.field === 'txtmuestra_{{$item->id}}') {
                var options = $('#frmOrden').find('[name="examen_{{$item->id}}[]"]:checked').val();
                if (typeof options === 'undefined') {
                    $('#frmOrden').find('[name="muestra_{{$item->id}}"]').val(0);
                    $('#frmOrden').find('[name="txtmuestra_{{$item->id}}"]').val('');
                    data.element.closest('.form-group').removeClass('has-success');
                }
            }
        })
        @endforeach     
        ;

        @foreach($tipos as $item) 
            //idsTE.push(parseInt({{$item->id}}));
            $("input[name='txtmuestra_{{$item->id}}']").trigger('keyup');
        @endforeach
    });
</script>
<style type="text/css">
    .ui-state-default .ui-icon {
        background-image: url(images/ui-icons_777777_256x240.png);
    }
</style>