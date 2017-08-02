@extends('backLayout.app')
@section('title')
Editar Exámen
@stop

@section('content')

    <h1>Editar Exámen</h1>
    <hr/>

    {!! Form::model($examan, [
        'method' => 'PATCH',
        'url' => ['examen', $examan->id],
        'class' => 'form-horizontal',
        'id'=>'frmItem'
    ]) !!}

                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('tipoexamens_id') ? 'has-error' : ''}}">
                {!! Form::label('tipoexamens_id', 'Tipo Examen: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {{ Form::select('tipoexamens_id', $items, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) }}
                    {!! $errors->first('tipoexamens_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('muestras_id') ? 'has-error' : ''}}">
                {!! Form::label('muestras_id', 'Muestra: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {{ Form::select('muestras_id', $muestras, null, ['class' => 'form-control','placeholder' => 'Seleccione']) }}
                    {!! $errors->first('muestras_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
          	{!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>    
@endsection

@section('scripts')
<script type="text/javascript">
   $(document).ready(function() {
       $('#frmItem').formValidation({
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
                },
            }
        });
    });

</script>
@endsection