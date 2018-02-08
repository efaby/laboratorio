@extends('layouts.app')

@section('title')
Login
@stop

@section('content')
 <div class="form-group" style="text-align: center;">
    <img src="{{URL::asset('images/logoLab.png')}}" alt="">
    </div>
    <h3 class="card-title text-left mb-3">Iniciar Sesi&oacute;n</h3>

    <form class="" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} p_input">
            <input id="cedula" type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" required autofocus placeholder="Usuario">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cedula') }}</strong>
                    </span>
                @endif
            
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control p_input" name="password" required placeholder="Password">

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
