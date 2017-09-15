@extends('backLayout.app')
@section('title')
Orden Exámen
@stop

@section('content')

<div class="panel-body">
    <h1>Orden de Exámen</h1>
    <hr/>
    <div class="form-group row">
               <div class="form-group row">                     
                    <div class="col-md-1">
                        <label for="nombre_pacient" class="col-md-1 control-label">Paciente</label>
                    </div>  
                    <div class="col-md-3">
                            {{ $paciente->apellidos }} {{ $paciente->nombres }}                   
                    </div>
                    <div class="col-md-1">
                        <label for="mail" class="col-md-1 control-label">Dirección</label>
                    </div>  
                    <div class="col-md-3">
                        {{ $paciente->direccion }}
                    </div>
                    <div class="col-md-1">
                        <label for="tel1" class="col-md-1 control-label">Teléfono</label>
                    </div>
                    <div class="col-md-3">
                       {{ $paciente->telefono }}
                    </div>
              </div>
              <div class="form-group row">                      
                    <div class="col-md-1">
                        <label for="celular" class="col-md-1 control-label">Celular</label>
                    </div>
                    <div class="col-md-3">
                        {{ $paciente->celular }}
                    </div>                      
                    <div class="col-md-1">
                        <label for="fecha_nacimiento" class="col-md-1 control-label">Edad</label>
                    </div>  
                    <div class="form-group col-md-3" style="margin: 0px;">
                        {{ $paciente->edad }}                      
                    </div>
                    <div class="col-md-1">
                        <label for="fecha_nacimiento" class="col-md-1 control-label">M&eacute;dico</label>
                    </div>  
                    <div class="form-group col-md-3" style="margin: 0px;">
                        {{ $orden->nombre_medico }}                  
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="tipo_paciente" class="col-md-12 control-label">Tipo Paciente</label>
                    </div>
                    <div class="col-md-3">
                        {{ $paciente->tipopaciente->nombre }}                  
                    </div>                    
                    <div class="col-md-2">
                        <label for="fecha_entrega" class="col-md-12 control-label">Fecha de Entrega</label>
                    </div>
                    <div class="col-md-3">
                           {{ $orden->fecha_entrega }}                                      
                    </div>
                    
                </div>

    {!! Form::open(['url' => 'orden/saveOrden', 'class' => 'form-horizontal', 'id'=>'frmItem' ]) !!}
      
            <div class="form-group {{ $errors->has('plantilla') ? 'has-error' : ''}}">
                
                <div class="col-sm-12">
                    {{ Form::textarea('plantilla', $plantilla, [ 'class' => 'form-control']) }}
                    {!! $errors->first('plantilla', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
           
            <div class="form-group">
                <div class="col-sm-12">
                	{!! Form::hidden('orden_id', $orden->id) !!}
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ url('orden') }}" class="btn btn-info btn-sm">Cancelar</a>
                </div>
            </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/vendor/ckeditor/adapters/jquery.js') }}"></script>

<script type="text/javascript">
   $(document).ready(function() {
       $('#frmItem').formValidation({
        excluded: [':disabled'],
        message: 'This value is not valid',
            fields: {   
                plantilla: {
                    validators: {
                        notEmpty: {
                            message: 'La Plantilla no pueden ser vacía.'
                        },
                        
                    }
                }
            }
        }).find('[name="plantilla"]')
        .ckeditor({
            toolbar: [
                { name: 'document', items: [ 'Print' ] },
                { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] },
                { name: 'editing', items: [ 'Scayt' ] },
                { name: 'insert', items: [ 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Iframe' ] }
            ],
            bodyClass: 'document-editor',
            format_tags: 'p;h1;h2;h3;pre',
            extraPlugins: 'pagebreak,print',
            contentsCss: [ 'https://cdn.ckeditor.com/4.6.1/full-all/contents.css', '{{ asset('/css/editorStyles.css') }}' ],
            height: 600
        })
        .editor                              // Get the editor instance
            .on('change', function(e) {  
                        // Revalidate the field that
                        // the current editor is attached to
                        // e.sender.name presents the field name
                        $('#frmItem').formValidation('revalidateField', e.sender.name);
        });
       
    });

</script>
@endsection
