@extends('backLayout.app')
@section('title')
Ver Resultados
@stop

@section('content')

    <h1>Ver Resultados</h1>
    <hr/>

    @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('status') }} fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif

    {!! Form::open(['url' => 'verExamen', 'class' => 'form-horizontal','id'=>'frmBuscar']) !!}

            <div class="form-group {{ $errors->has('identificacion') ? 'has-error' : ''}}">
                {!! Form::label('identificacion', 'Identificación: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('identificacion', $identificacion, ['class' => 'form-control']) !!}
                    {!! $errors->first('identificacion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
                {!! Form::label('codigo', 'Código: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('codigo', $codigo, ['class' => 'form-control']) !!}
                    {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
            
        </div>
    </div>
    {!! Form::close() !!}

    
    @if ($id > 0) 
        <hr>
        <object data="{{ url('examenPdf/'.$id) }}" type="application/pdf" width="100%" height="600">
            <p>Your web browser doesn't have a PDF plugin.
                Instead you can <a href="{{ url('orden/ordenPdf/'.$id) }}">click here to
                download the PDF file.</a></p>
        </object>
    @endif

@endsection

@section('scripts')
<script type="text/javascript">
   $(document).ready(function() {
       $('#frmBuscar').formValidation({
        message: 'This value is not valid',
            fields: {   
                identificacion: {
                    message: 'El Número de Identificación no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Número de Identificación no puede ser vacío.'
                        },                   
                        regexp: {
                            regexp: /^(?:\+)?\d{10,13}$/,
                            message: 'Ingrese un Número de Identificación válido.'
                        }                               
                    }
                },
                codigo: {
                   message: 'El Código no es valido',
                   validators: {
                       notEmpty: {
                           message: 'El Código no puede ser vacíos.'
                       },
                       regexp: {
                           regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
                           message: 'Ingrese un Código válido.'
                       }
                   }
               },
            }
        });
    });
</script>
@endsection