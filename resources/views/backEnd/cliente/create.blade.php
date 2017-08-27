@extends('backLayout.app')
@section('title')
Nuevo Cliente
@stop

@section('content')

    <h1>Create New Cliente</h1>
    <hr/>

    {!! Form::open(['url' => 'cliente', 'class' => 'form-horizontal','id'=>'frmCliente']) !!}

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
                {!! Form::label('Teléfono', 'Teléfono: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
        {!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
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
               }
           });
       });


   </script>
   @endsection