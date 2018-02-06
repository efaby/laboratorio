@extends('backLayout.app')
@section('title')
Editar Tipo de Paciente
@stop

@section('content')

<h3 class="page-heading mb-4">Editar Tipo de Paciente </h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

    {!! Form::model($tipopaciente, [
        'method' => 'PATCH',
        'url' => ['tipopaciente', $tipopaciente->id],
        'class' => 'form-horizontal',
        'id'=>'frmTipoPaciente'
    ]) !!}

                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>            
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
        	{!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary mr-2' , 'style' => 'min-height: auto;']) !!}
            <a href="{{ url('tipopaciente') }}" class="btn btn-info mr-2">Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
    </div>
    </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
   $(document).ready(function() {
       $('#frmTipoPaciente').formValidation({
        message: 'This value is not valid',
            fields: {   
                nombre: {
                    message: 'El Nombre no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Nombre no puede ser vacío.'
                        },
                        regexp: {
                            regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
                            message: 'Ingrese un Nombre válido.'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection