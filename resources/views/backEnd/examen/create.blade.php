@extends('backLayout.app')
@section('title')
Create new Examan
@stop

@section('content')

    <h1>Create New Examan zxcxzzx</h1>
    <hr/>

    {!! Form::open(['url' => 'examen', 'class' => 'form-horizontal', 'id'=>'frmItem']) !!}

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
                    {{ Form::select('tipoexamens_id', $items, null, ['class' => 'form-control']) }}
                    {!! $errors->first('tipoexamens_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
                {!! Form::label('estado', 'Estado: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('estado', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


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
