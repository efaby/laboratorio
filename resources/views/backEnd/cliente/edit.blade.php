@extends('backLayout.app')
@section('title')
Editar Cliente
@stop

@section('content')

    <h1>Edit Cliente</h1>
    <hr/>

    {!! Form::model($cliente, [
        'method' => 'PATCH',
        'url' => ['cliente', $cliente->id],
        'class' => 'form-horizontal',
        'id'=>'frmCliente'
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
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
        {!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
        {!! Form::hidden('id', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url('cliente') }}" class="btn btn-info btn-sm">Cancelar</a>
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
       $('#frmCliente').formValidation({
        message: 'This value is not valid',
            fields: {
                   cedula: {
                        message: 'El Número de Cédula no es válido',
                        validators: {  
                            notEmpty: {
                           message: 'El Número de Cédula no pueden ser vacío.'
                        },         
                          regexp: {
                              regexp: /^(?:\+)?\d{10,13}$/,
                              message: 'Ingrese un Número de Identificación válido.'
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
                           regexp: {
                               regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
                               message: 'Ingrese los Apellidos válidos.'
                           },
                           callback: {
                            message: 'El apellido no puede ser vacio',
                            callback: function(value, validator, $field) {
                                var tipo = $('#frmCliente').find('[name="tipopacientes_id"]').val();
                                console.log("tipo", tipo);
                                return (parseInt(tipo) !== 1) ? true : (value !== '');
                              
                            }
                      }
                       }
                   },
                   direccion: {
                       message: 'La Dirección no es válida',
                       validators: {
                        notEmpty: {
                           message: 'La Dirección no pueden ser vacía.'
                        },
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
                  }               
               }
           })
       .on('change', '[name="tipopacientes_id"]', function(e) {
            $('#frmCliente').formValidation('revalidateField', 'apellidos');
        })
        .on('success.field.fv', function(e, data) {
            if (data.field === 'frmCliente') {
                var type = $('#frmCliente').find('[name="tipopacientes_id"]').val();
                // User choose given channel
                if (parseInt(type) !== 1) {
                    // Remove the success class from the container
                    data.element.closest('.form-group').removeClass('has-success');

                    // Hide the tick icon
                    data.element.data('fv.icon').hide();
                } else {
                  $('#frmCliente').formValidation('revalidateField', 'apellidos');
                }
            }
        })
       ;
       });


   </script>
   @endsection