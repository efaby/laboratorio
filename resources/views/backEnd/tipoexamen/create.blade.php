@extends('backLayout.app')
@section('title')
Nuevo Tipo de Exámen
@stop

@section('content')

    <h1>Nuevo Tipo de Exámen</h1>
    <hr/>

    {!! Form::open(['url' => 'tipoexamen', 'class' => 'form-horizontal','id'=>'frmTipoExamen']) !!}

                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
        	{!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
<script type="text/javascript">
   $(document).ready(function() {
       $('#frmTipoExamen').formValidation({
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