@extends('backLayout.app')
@section('title')
Editar Exámen
@stop

@section('content')

    <h1>Editar Exámen</h1>
    <hr/>

    {!! Form::model($examan, [
        'method' => 'PATCH',
        'url' => ['examen', $examan->id],
        'class' => 'form-horizontal',
        'id'=>'frmItem'
    ]) !!}

                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('tipoexamens_id') ? 'has-error' : ''}}">
                {!! Form::label('tipoexamens_id', 'Tipo Examen: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {{ Form::select('tipoexamens_id', $items, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) }}
                    {!! $errors->first('tipoexamens_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>     
            <div class="form-group {{ $errors->has('plantilla') ? 'has-error' : ''}}">
                {!! Form::label('plantilla', 'Plantilla: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {{ Form::textarea('plantilla', null, ['size' => '80x10', 'class' => 'form-control']) }}
                    {!! $errors->first('plantilla', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('precio_normal') ? 'has-error' : ''}}">
                {!! Form::label('precio_normal', 'Precio Particular: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('precio_normal', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('precio_normal', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('precio_laboratorio') ? 'has-error' : ''}}">
                {!! Form::label('precio_laboratorio', 'Precio Laboratorio: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('precio_laboratorio', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('precio_laboratorio', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('precio_clinica') ? 'has-error' : ''}}">
                {!! Form::label('precio_clinica', 'Precio Clinica: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('precio_clinica', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('precio_clinica', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
          	{!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url('examen') }}" class="btn btn-info btn-sm">Cancelar</a>
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
                nombre: {
                    message: 'El Nombre no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Nombre no puede ser vacío.'
                        },
                        regexp: {
                            regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-\(\)\"]+$/,
                            message: 'Ingrese un Nombre válido.'
                        }
                    }
                },
                tipoexamens_id: {
                    message: 'El Tipo de Exámen no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Tipo de Exámen no puede ser vacío.'
                        }
                    }
                },
                plantilla: {
                    validators: {
                        notEmpty: {
                            message: 'La Plantilla no pueden ser vacía.'
                        },
                        
                    }
                },
                precio_normal: {
                    message: 'El Precio Particular no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Precio Particular no puede ser vacío.'
                        },
                        regexp: {
                            regexp: /^[+-]?\d+(\.\d+)?$/,
                            message: 'Ingrese un Precio Particular válido.'
                        }
                    }
                },
                precio_laboratorio: {
                    message: 'El Precio Laboratorio no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Precio Laboratorio no puede ser vacío.'
                        },
                        regexp: {
                            regexp: /^[+-]?\d+(\.\d+)?$/,
                            message: 'Ingrese un Precio Laboratorio válido.'
                        }
                    }
                },
                precio_clinica: {
                    message: 'El Precio Clinica no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Precio Clinica no puede ser vacío.'
                        },
                        regexp: {
                            regexp: /^[+-]?\d+(\.\d+)?$/,
                            message: 'Ingrese un Precio Clinica válido.'
                        }
                    }
                },
            }
        }).find('[name="plantilla"]')
        .each(function() {
            $(this)
                // Attach an editor to field
                .ckeditor({
            toolbar: [
                { name: 'document', items: [ 'Print' ] },
                { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', '-', 'Subscript', 'Superscript', '-', 'RemoveFormat', 'CopyFormatting' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent' ] },
                { name: 'editing', items: [ 'Scayt' ] },
                { name: 'insert', items: [ 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Iframe' ] }
                ],
                extraPlugins: 'justify,basicstyles',
                removeButtons: ''
            })
                .editor
                    .on('change', function(e) {
                        // Revalidate the field that
                        // the current editor is attached to
                        // e.sender.name presents the field name
                        $('#frmItem').formValidation('revalidateField', e.sender.name);
                    });
        });
       ;
    });

</script>
@endsection