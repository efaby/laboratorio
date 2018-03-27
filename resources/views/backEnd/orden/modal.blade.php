<div class="modal-header">
     
    <h4 class="modal-title">Generación de Código de Orden</h4>
    <a href="{{ url('orden/updatePage') }}" aria-hidden="true" class="close" title="Cerrar">
        &times;
    </a>   
</div>
<div class="modal-body" style="text-align: left">
<div class="col-sm-12">
    <table style="margin: 0 auto;" id="print">
        <tr>
            <td><h6 class="modal-title">Identificación:</h6></td>
            <td style="width: 50%"><h4>{{$paciente_ced}}</h4></td>
        </tr>
        <tr>
            <td><h6 class="modal-title">Código:</h6></td>
            <td><h4>{{$codigo}}</h4></td>
        </tr>
    </table> 	
</div>
</div>
<div class="modal-footer">
    <a href="{{ url('orden/enviarCodigo', ['id' => $id]) }}" class="btn btn-primary" title="Enviar Correo">Enviar Correo</a>
    <button type="button" id="imprimir" class="btn btn-warning">Imprimir</button>
    <a href="{{ url('orden/updatePage') }}" class="btn btn-secondary" title="Cerrar">
    	Cerrar
    </a>        
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#imprimir").bind("click",function() {
            $("#print").printArea();
        });
    });

    
</script>