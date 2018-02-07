@extends('backLayout.app')
@section('title')
Orden Exámen
@stop

@section('content')


    <h3 class="page-heading mb-4">Orden de Exámen</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

    @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('status') }}">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="form-group">
          	   <div class="form-group row">
          	        <div class="col-md-12">
          	        	<div class="pull-right">
                            @if ($orden->validado)
                                <a  href="{{ url('orden/imprimir/'.$orden->id) }}" class="btn btn-warning mr-2" title="Imprimir">Imprimir</a>
                            @endif          	        	 	          	        	 
          	        	 </div>
          	        </div>
          	   </div>
               <div class="form-group row">                     
                    <div class="col-md-1">
                        <label for="nombre_pacient" class="control-label">Paciente</label>
                    </div>  
                    <div class="col-md-3">
                           <div class="col-md-12"> {{ $paciente->apellidos }} {{ $paciente->nombres }}  </div>                 
                    </div>
                    <div class="col-md-1">
                        <label for="mail" class="control-label">Dirección</label>
                    </div>  
                    <div class="col-md-3">
                        <div class="col-md-12">{{ $paciente->direccion }}</div>
                    </div>
                    <div class="col-md-1">
                        <label for="tel1" class="control-label">Teléfono</label>
                    </div>
                    <div class="col-md-3">
                       <div class="col-md-12">{{ $paciente->telefono }}</div>
                    </div>
              </div>
              <div class="form-group row">                      
                    <div class="col-md-1">
                        <label for="celular" class="control-label">Celular</label>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12">{{ $paciente->celular }}</div>
                    </div>                      
                    <div class="col-md-1">
                        <label for="fecha_nacimiento" class="control-label">Edad</label>
                    </div>  
                    <div class="form-group col-md-3" style="margin: 0px;">
                        <div class="col-md-12">{{ $paciente->edad }}</div>                      
                    </div>
                    <div class="col-md-1">
                        <label for="fecha_nacimiento" class="control-label">M&eacute;dico</label>
                    </div>  
                    <div class="form-group col-md-3" style="margin: 0px;">
                        <div class="col-md-12">{{ $orden->nombre_medico }}</div>                  
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="tipo_paciente" class="control-label">Tipo Paciente</label>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12">{{ $paciente->tipopaciente->nombre }}</div>                  
                    </div>                    
                    <div class="col-md-2">
                        <label for="fecha_entrega" class="control-label">Fecha de Entrega</label>
                    </div>
                    <div class="col-md-3">
                           <div class="col-md-12">{{ $orden->fecha_entrega }}</div>                                  
                    </div>
                    
                </div>

    {!! Form::open(['url' => 'orden/saveOrden', 'class' => 'form-horizontal', 'id'=>'frmItem' ]) !!}
     		<div class="form-group" style="text-align: right;">
                <div class="col-sm-12">
                	{!! Form::hidden('orden_id', $orden->id) !!}
                    {!! Form::hidden('validar', $validar) !!}
                    @if ($validar)
                        {!! Form::submit('Validar', ['class' => 'btn btn-primary mr-2 ' , 'style' => 'min-height: auto;']) !!}
                    @else
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary mr-2 ' , 'style' => 'min-height: auto;']) !!}
                    @endif                    
                    <a href="{{ url('orden') }}" class="btn btn-secondary mr-2">Salir</a>
                </div>
            </div>
      
            <div class="form-group {{ $errors->has('plantilla') ? 'has-error' : ''}}">
                
                <div class="col-sm-12">
                    {{ Form::textarea('plantilla', $plantilla, [ 'class' => 'form-control']) }}
                    {!! $errors->first('plantilla', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
           
           
    {!! Form::close() !!}
</div>
</div>
</div>
</div>
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
               
                { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', '-', 'Subscript', 'Superscript', '-', 'RemoveFormat', 'CopyFormatting' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] },
                { name: 'editing', items: [ 'Scayt' ] },
                { name: 'insert', items: [ 'Table', 'SpecialChar', 'PageBreak' ] }
            ],
            bodyClass: 'document-editor',
            format_tags: 'p;h1;h2;h3;pre',
            extraPlugins: 'pagebreak,print,justify,basicstyles',
            contentsCss: [ 'https://cdn.ckeditor.com/4.6.1/full-all/contents.css', '{{ asset('/css/editorStyles.css') }}' ],
            height: 600,
            removeButtons: ''
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
