@extends('layouts.app')

@section('title')
Login
@stop

@section('content')
 <div class="form-group" style="text-align: center;">
    <img src="{{URL::asset('images/logoLab.png')}}" alt="">
    </div>
    <h3 class="card-title text-left mb-3">Iniciar Sesi&oacute;n</h3>

    <form class="" method="POST" action="{{ route('login') }}" id="frmEntidad">
        {{ csrf_field() }}

        @if(Session::has('mensaje_error'))
                        <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                    @endif


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} p_input">
            <input id="cedula" type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" required autofocus placeholder="Usuario" maxlength="10">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cedula') }}</strong>
                    </span>
                @endif
            
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control p_input" name="password" required placeholder="Password" maxlength="16">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group d-flex align-items-center justify-content-between">                            
                <div class="form-check">
                    <label>
                        <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                    </label>
                </div>
                <a class="btn btn-link forgot-pass" href="{{ route('password.request') }}">
                    Olvidaste tu contraseña?
                </a> 
        </div>

        <div class="form-group">            
                <button type="submit" class="btn btn-primary btn-block enter-btn">
                    Ingresar
                </button>
        </div>
    </form>
@endsection

@section('scripts')
<script src="{{URL::asset('js/formValidation.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.js')}}"></script>

<script type="text/javascript">
   $(document).ready(function() {
       $('#frmEntidad').formValidation({
        message: 'This value is not valid',
            fields: {   
                cedula: {
                    message: 'El Usuario no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Usuario no puede ser vacío.'
                        },
                        regexp: {
                            regexp: /^(?:\+)?\d{10}$/,
                            message: 'Ingrese un Usuario válido.'
                        }
                    }
                },
                 password: {
                    validators: {
                        notEmpty: {
                            message: 'La Contraseña no puede ser vacía.'
                        },
                        regexp: {
                           regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\_\-]+$/,
                           message: 'Ingrese una Contraseña válida.'
                       }
                    }
                }
            }
        });
    });
</script>
@endsection
