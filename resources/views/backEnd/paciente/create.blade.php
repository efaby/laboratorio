@extends('backLayout.app')
@section('title')
Nuevo Paciente
@stop

@section('content')

<h3 class="page-heading mb-4">Nuevo Paciente</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

    {!! Form::open(['url' => 'paciente', 'class' => 'form-horizontal','id'=>'frmPaciente']) !!}
            <div class="form-group {{ $errors->has('cedula') ? 'has-error' : ''}}">
            	{!! Form::hidden('tipopacientes_id', 1, ['class' => 'form-control']) !!}
            	
                {!! Form::label('cedula', 'Cédula: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cedula', '<p class="help-block">:message</p>') !!}
                </div>                 
                <div class="col-sm-1">
                 	{!! Form::checkbox('codigo', 0,false,['id'=>'codigo']) !!}                    
                    <b>Código</b>                    
                </div>
            </div>
            <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                {!! Form::label('apellidos', 'Apellidos: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('apellidos', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                {!! Form::label('nombres', 'Nombres: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nombres', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('edad') ? 'has-error' : ''}}">
                {!! Form::label('edad', 'Edad: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('edad', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('celular') ? 'has-error' : ''}}">
                {!! Form::label('celular', 'Celular: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('celular', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                {!! Form::label('direccion', 'Dirección: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                {!! Form::label('Teléfono', 'Teléfono: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
                {!! Form::label('genero', 'Género: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::select('genero', array(null => 'Seleccione','Fem' => 'Femenino', 'Mas' => 'Masculino','Na'=>'No Aplica'),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('enfermedades') ? 'has-error' : ''}}">
                {!! Form::label('enfermedades', 'Datos Cl&iacute;nicos: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::textarea('enfermedades', null, ['size' => '80x10','class' => 'form-control']) !!}                     
                    {!! $errors->first('enfermedades', '<p class="help-block">:message</p>') !!}
                </div>
            </div>       
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
        	{!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
          {!! Form::hidden('id', 0, ['class' => 'form-control']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary mr-2', 'style' => 'min-height: auto;']) !!}
            <a href="{{ url('paciente') }}" class="btn btn-info mr-2">Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
    </div>
    </div>
    </div>
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
       						regexp: /^[0-9]+$/,
       						enabled: false,
       						message: 'Ingrese un Número de Identificación válido.'
       					},
       					notEmpty: {
       						enabled: false,
       	                    message: 'La Cédula no puede ser vacía.'
	                    },       					
                remote: {
                            message: 'El Número de Identificación ya existe.',
                            url: '{{ url('validarCedula') }}',
                            data: function(validator, $field, value) {
                                return {
                                    id: validator.getFieldElements('id').val(),
                                    _token: "{{ csrf_token() }}"
                                };
                            },                            
                            type: 'POST'
                        },                  
                      /*  callback: {
                                  message: 'El Número de Identificación no es válido.',
                                  callback: function (value, validator, $field) {
                                    var cedula = value;
                                    try {
                                        array = cedula.split("");
                                    }
                                    catch (e) {
                                        //array = null;
                                    }
                                    num = array.length;
                                    if (num === 10) {
                                        total = 0;
                                        digito = (array[9] * 1);
                                        for (i = 0; i < (num - 1); i++) {
                                            mult = 0;
                                            if ((i % 2) !== 0) {
                                                total = total + (array[i] * 1);
                                            } else {
                                                mult = array[i] * 2;
                                                if (mult > 9)
                                                    total = total + (mult - 9);
                                                else
                                                    total = total + mult;
                                            }
                                        }
                                        decena = total / 10;
                                        decena = Math.floor(decena);
                                        decena = (decena + 1) * 10;
                                        final = (decena - total);
                                        if ((final === 10 && digito === 0) || (final === digito)) {
                                
                                            return true;
                                        } else {
                                
                                            return false;
                                        }
                                    } else {
                                
                                        return false;
                                    }
                                }  */	       						
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
                           message: 'Los Apellidos no pueden ser vacíos.'
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
                   email: {
                    message: 'El Email no es válido',
                    validators: {
                      
                      emailAddress: {
                        message: 'Ingrese un Email válido.'
                      }
                    }
                  },
                   edad: {
                       message: 'La Edad no es válida',
                       validators: {
                        notEmpty: {
                               message: 'La Edad no puede ser vacía.'
                           },
                         regexp: {
                             regexp: /^[1-9]\d*$/,
                             message: 'Ingrese una Edad válida.'
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

		   $('#codigo').click(function() {
			   if( $('#codigo').is(':checked') ) {
				    $('#apellidos').val('Paciente');
		   			$('#nombres').val('Laboratorio');
		   			$('#celular').val('0000000000');
		   			$('#genero').val('Na');
		   		 	$('#frmPaciente').formValidation('enableFieldValidators', 'cedula', true, 'notEmpty');
		   		 	$('#frmPaciente').formValidation('enableFieldValidators', 'cedula', true, 'regexp');
		   		 
				}else{
					$('#apellidos').val(null);
		   			$('#nombres').val(null);
		   			$('#celular').val(null);
		   			$('#genero').val(null);	
		   			$('#frmPaciente').formValidation('enableFieldValidators', 'cedula', false, 'notEmpty');		   			
				}
		    });
       });
   </script>
   @endsection