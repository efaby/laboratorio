@extends('backLayout.app')
@section('title')
Home
@stop

@section('content')
<h3 class="page-heading mb-4">Cambio Contrase&ntilde;a</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
 
                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}" id="frmUser">
                        {{ csrf_field() }}
 
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Contrase&ntilde;a Actual</label>
 
                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>
 
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Nueva Contrase&ntilde;a</label>
 
                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
 
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Repetir Nueva Contrase&ntilde;a</label>
 
                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
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
       $('#frmUser').formValidation({
        message: 'This value is not valid',
        fields: {  
            "current-password": {
                    message: 'La Contraseña Actual no es válida.',
                    validators: {   
              notEmpty: {
                           message: 'La Contraseña Actual no puede ser vacía.'
                        }
                          
                    }
                },                      
            "new-password": {
            validators: {
              notEmpty: {
                           message: 'La Nueva Contraseña no puede ser vacía.'
                       },
                identical: {
                    field: 'new-password_confirmation',
                    message: 'La Nueva Contraseña no coincide.'
                },
                stringLength: {
                        message: 'La Nueva Contraseña debe tener al menos 6 caracteres',
                        min: 6
                    }
            }
        },
        "new-password_confirmation": {
            validators: {
                identical: {
                    field: 'password',
                    message: 'La Nueva Contraseña no coincide.'
                }
            }
        }           
               }
           });
       });


   </script>
   @endsection
