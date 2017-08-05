@extends('backLayout.app')
@section('title')
Nuevo Exámen
@stop

@section('content')

    <h1>Nuevo Exámen</h1>
    <hr/>
    {!! Form::open(['url' => 'examen', 'class' => 'form-horizontal', 'id'=>'frmItem']) !!}
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
                    {{ Form::select('tipoexamens_id', $items, null, ['class' => 'form-control','placeholder' => 'Seleccione']) }}
                    {!! $errors->first('tipoexamens_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('muestras_id') ? 'has-error' : ''}}">
                {!! Form::label('muestras_id', 'Muestra: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {{ Form::select('muestras_id', $muestras, null, ['class' => 'form-control','placeholder' => 'Seleccione']) }}
                    {!! $errors->first('muestras_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
            <div class="form-group {{ $errors->has('plantilla') ? 'has-error' : ''}}">
                {!! Form::label('plantilla', 'Plantilla: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {{ Form::textarea('plantilla', null, ['size' => '80x10', 'class' => 'form-control']) }}
                    {!! $errors->first('plantilla', '<p class="help-block">:message</p>') !!}
                </div>
            </div>



    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
        	{!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

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
                            regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
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
                muestras_id: {
                    message: 'La muestra no es válida',
                    validators: {
                        notEmpty: {
                            message: 'La Muestra no puede ser vacío.'
                        }
                    }
                }
            }
        }).find('[name="plantilla"]')
        .each(function() {
            $(this)
                // Attach an editor to field
                .ckeditor()
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
