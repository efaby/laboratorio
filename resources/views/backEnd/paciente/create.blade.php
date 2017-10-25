@extends('backLayout.app')
@section('title')
Nuevo Paciente
@stop

@section('content')

    <h1>Nuevo Paciente</h1>
    <hr/>

    {!! Form::open(['url' => 'paciente', 'class' => 'form-horizontal','id'=>'frmPaciente']) !!}

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
            <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                {!! Form::label('apellidos', 'Apellidos: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('apellidos', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                {!! Form::label('nombres', 'Nombres: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nombres', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('edad') ? 'has-error' : ''}}">
                {!! Form::label('edad', 'Edad: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('edad', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
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
                {!! Form::label('Teléfono', 'Teléfono: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
                {!! Form::label('genero', 'Género: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('genero', array(null => 'Seleccione','Fem' => 'Femenino', 'Mas' => 'Masculino'),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('enfermedades') ? 'has-error' : ''}}">
                {!! Form::label('enfermedades', 'Datos Cl&iacute;nicos: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('enfermedades', null, ['size' => '80x10','class' => 'form-control']) !!}                     
                    {!! $errors->first('enfermedades', '<p class="help-block">:message</p>') !!}
                </div>
            </div>       
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
        	{!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url('paciente') }}" class="btn btn-info btn-sm">Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('scripts')

<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/calendar.js') }}"></script>

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
                           message: 'Los Nombres no pueden ser vacíos.'
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
                celular: {
                	   message: 'El Celular no es válido',
                       validators: {
                           notEmpty: {
                               message: 'El Número de Celular no puede ser vacío.'
                           },
                           regexp: {
                        	   regexp: /^(?:\+)?\d{10}$/,
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
	                           regexp: /^(?:\+)?\d{9}$/,
	                           message: 'Ingrese un Número de Teléfono válido.'
	                       }
                       }
                   },
                   edad: {
                       message: 'La edad no es válida',
                       validators: {
                        notEmpty: {
                               message: 'La edad no puede ser vacía.'
                           },
                         regexp: {
                             regexp: /^[1-9]\d*$/,
                             message: 'Ingrese una edad válida.'
                         }
                       }
                   },
                   genero: {
                       message: 'El Género no es válido',
                       validators: {
                    	   notEmpty: {
                               message: 'El Género no puede ser vacío.'
                           }
                       }
                   }            
               }
           });
       });


   </script>
   @endsection