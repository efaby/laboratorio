@extends('backLayout.app')
@section('title')
Editar Usuario
@stop

@section('content')

    <h1>Editar Usuario</h1>
    <hr/>

    {!! Form::model($user, [
        'method' => 'PATCH',
        'url' => ['user', $user->id],
        'class' => 'form-horizontal',
        'id'=>'frmUser'
    ]) !!}
            
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
            
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                {!! Form::label('direccion', 'Dirección: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
                {!! Form::label('roles', 'Roles: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">

                   @foreach($items as $item) 
                    {!! Form::checkbox('roles[]', $item->id ) !!}
                    {{ $item->nombre }}
                  @endforeach
                    {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
                </div>
              </div>
              <div class="form-group {{ $errors->has('entidad_id') ? 'has-error' : ''}}">
                {!! Form::label('entidad_id', 'Entidad: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {{ Form::select('entidad_id', $entidades, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) }}
                    {!! $errors->first('entidad_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div> 
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                {!! Form::label('password', 'Contrase&ntilde;a: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <input id="password" type="password" class="form-control" name="password">
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
          <div class="form-group {{ $errors->has('password-confirm') ? 'has-error' : ''}}">
                {!! Form::label('password', 'Confirmar Contrase&ntilde;a: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                <input id="password-confirm" type="password" class="form-control" name="password-confirm" >
                    {!! $errors->first('password-confirm', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
          {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url('user') }}" class="btn btn-info btn-sm">Cancelar</a>
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
       $('#frmUser').formValidation({
        message: 'This value is not valid',
            fields: {
              'roles[]': {
                validators: {
                    choice: {
                        min: 1,
                        message: 'Seleccione almenos un Rol'
                    }
                }
            },  
            entidad_id: {
                    message: 'La Entidad no es válida',
                    validators: {
                        notEmpty: {
                            message: 'La Entidad no puede ser vacía.'
                        }
                    }
                },
               cedula: {
              message: 'El Número de Cédula no es válido',
              validators: { 
              notEmpty: {
                           message: 'El Número de Cédula no pueden ser vacío.'
                        },        
                regexp: {
                  regexp: /^(?:\+)?\d{10}$/,
                  message: 'Ingrese un Número de Identificación válido.'
                },
                remote: {
                            message: 'El Número de Identificación ya existe.',
                            url: '{{ url('validarCedulaUser') }}',
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
                           message: 'Los Apellidos no puedem ser vacíos.'
                       },
                       regexp: {
                           regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
                           message: 'Ingrese los Apellidos válidos.'
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
                   email: {
                    message: 'El Email no es válido',
                    validators: {
                      notEmpty: {
                           message: 'El Email no puede ser vacío.'
                       },
                      emailAddress: {
                        message: 'Ingrese un Email válido.'
                      }
                    }
                  },
                   password: {
            validators: {
                identical: {
                    field: 'password-confirm',
                    message: 'La Contraseña no coinside.'
                },
                stringLength: {
                        message: 'La Contraseña debe tener almenos 6 caracteres',
                        min: 6
                    }
            }
        },
        "password-confirm": {
            validators: {
                identical: {
                    field: 'password',
                    message: 'La Contraseña no coinside.'
                }
            }
        }           
               }
           });
       });


   </script>
   @endsection