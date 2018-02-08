@extends('layouts.app')
@section('title')
Recuperar Contrase&ntilde;a
@stop
@section('content')

    <div class="row">
            <div class="panel panel-default" style="width: 100%;">
                <div class="panel-heading"><h5>Recuperar Contrase&ntilde;a</h5></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar Link Recuperar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
