@extends('backLayout.app')
@section('title')
Editar Paciente
@stop

@section('content')

    <h1>Editar Paciente</h1>
    <hr/>

    {!! Form::model($paciente, [
        'method' => 'PATCH',
        'url' => ['paciente', $paciente->id],
        'class' => 'form-horizontal',
        'id'=>'frmPaciente'
    ]) !!}

            <div class="form-group {{ $errors->has('tipopacientes_id') ? 'has-error' : ''}}">
                {!! Form::label('tipopacientes_id', 'Tipo Paciente: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {{ Form::select('tipopacientes_id', $items, null, ['class' => 'form-control','placeholder' => 'Seleccione']) }}
                    {!! $errors->first('tipopacientes_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>            
            <div class="form-group {{ $errors->has('cedula') ? 'has-error' : ''}}">
                {!! Form::label('cedula', 'Cédula: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cedula', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                {!! Form::label('nombres', 'Nombres: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nombres', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                {!! Form::label('apellidos', 'Apellidos: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('apellidos', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fecha_nacimiento') ? 'has-error' : ''}}">
                {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('fecha_nacimiento', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('celular') ? 'has-error' : ''}}">
                {!! Form::label('celular', 'Celular: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('celular', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                {!! Form::label('direccion', 'Dirección: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                {!! Form::label('telefono', 'Teléfono: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
                {!! Form::label('genero', 'Género: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('genero', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('enfermedades') ? 'has-error' : ''}}">
                {!! Form::label('enfermedades', 'Enfermedades: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('enfermedades', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('enfermedades', '<p class="help-block">:message</p>') !!}
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
       $('#frmPaciente').formValidation({
        message: 'This value is not valid',
            fields: {
            	   tipopacientes_id: {
                       message: 'El Tipo de Paciente no es válido',
                       validators: {
                           notEmpty: {
                               message: 'El Tipo de Paciente no puede ser vacío.'
                           }
                       }
                   },  
                   cedula: {
	       				message: 'El Número de Cédula no es válido',
	       				validators: {
	       							notEmpty: {
	       								message: 'El Número de Cédula no puede ser vacío.'
	       							},					
	       							regexp: {
	       								regexp: /^(?:\+)?\d{10,13}$/,
	       								message: 'Ingrese un Número de Identificación válido.'
	       							}
	       				}
	       			},       				
            	   nombres: {
                       message: 'Los Nombres no son válidos',
                       validators: {
                           notEmpty: {
                               message: 'Los Nombres no puedem ser vacíos.'
                           },
                           regexp: {
                               regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
                               message: 'Ingrese los Nombres válidos.'
                           }
                       }
                   },
                   apellidos: {
                       message: 'Los Apellidos no son válidos',
                       validators: {
                           notEmpty: {
                               message: 'Los Apellidos no puedem ser vacíos.'
                           },
                           regexp: {
                               regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
                               message: 'Ingrese los Apellidos válidos.'
                           }
                       }
                   },
                   fecha_nacimiento: {
                       message: 'La Fecha de Nacimiento no es válida',
                       validators: {
                    	   notEmpty: {
                               message: 'La Fecha de Nacimiento no puedem ser vacía.'
                           }                        
                       }
                   },
                   celular: {
                	   message: 'El Celular no es válido',
                       validators: {
                           notEmpty: {
                               message: 'El Número de Celular no puede ser vacío.'
                           },
                           regexp: {
                        	   regexp: /^(?:\+)?\d{9}$/,
                        	   message: 'Ingrese un Número de Celular válido.'
                           }
                       }
                   },
                   direccion: {
                       message: 'La Dirección no es válida',
                       validators: {
                    	   regexp: {
	                           regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/,
	                           message: 'Ingrese una Dirección válida.'
	                       }
                       }
                   },
                   telefono: {
                       message: 'El Número de Teléfono no es válido',
                       validators: {
                    	   regexp: {
	                           regexp: /^(?:\+)?\d{10}$/,
	                           message: 'Ingrese un Número de Teléfono válido.'
	                       }
                       }
                   },
                   genero: {
                       message: 'El Género no es válido',
                       validators: {
                    	   regexp: {
	                           regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/,
	                           message: 'Ingrese un Género válido.'
	                       }
                       }
                   }            
               }
           });
       });

   </script>
   @endsection