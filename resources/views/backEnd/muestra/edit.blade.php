@extends('backLayout.app')
@section('title')
Editar Muestra
@stop

@section('content')

    <h1>Editar Muestra</h1>
    <hr/>

    {!! Form::model($muestra, [
        'method' => 'PATCH',
        'url' => ['muestra', $muestra->id],
        'class' => 'form-horizontal',
        'id'=>'frmMuestra'
    ]) !!}

                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                {!! Form::label('descripcion', 'Descripcion: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
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
<script type="text/javascript">
   $(document).ready(function() {
       $('#frmMuestra').formValidation({
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
                descripción: {
                    message: 'La Descripción no es válida',
                    validators: {
                        regexp: {
                            regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
                            message: 'Ingrese una Descripción válida.'
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
                muestras_id: {
                    message: 'La muestra no es válida',
                    validators: {
                        notEmpty: {
                            message: 'La Muestra no puede ser vacío.'
                        }
                    }
                }
            }
        });
    });

</script>
@endsection