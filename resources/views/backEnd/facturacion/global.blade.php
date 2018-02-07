@extends('backLayout.app')
@section('title')
Factura Global
@stop

@section('content')
<h3 class="page-heading mb-4">Factura Global </h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

    @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('status') }}">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif

    {!! Form::open(['url' => 'facturacion/global', 'class' => 'form-horizontal','id'=>'frmBuscar']) !!}
    <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

           <div class="col-md-1 ">
                <label for="cliente_id" class="control-label">Cliente</label>
            </div>
            <div class="col-md-3">
                {{ Form::select('cliente_id', $items, $cliente_id, ['class' => 'form-control input-sm','placeholder' => 'Seleccione','id'=>'cliente_id']) }}                    
            </div>
            <div class="col-md-1">
                        <label for="fecha_inicio" class="control-label">Fecha de Inicio</label>
                    </div>
            <div class="col-md-2">
                {!! Form::text('fecha_inicio', $fecha_inicio, ['class' => 'form-control input-sm','placeholder' => 'Fecha de Inicio','id'=>'fecha_inicio']) !!}                                           
            </div> 
            <div class="col-md-1">
                <label for="fecha_fin" class="control-label">Fecha de Fin</label>
            </div>
            <div class="col-md-2">
                {!! Form::text('fecha_fin', $fecha_fin, ['class' => 'form-control input-sm','placeholder' => 'Fecha de Fin','id'=>'fecha_fin']) !!}                                           
            </div> 
            <div class="col-md-1">
                {!! Form::submit('Buscar', ['class' => 'btn btn-primary mr-2', 'style' => 'min-height: auto;']) !!}
                </div>
     </div>
    {!! Form::close() !!}

    
    @if ($total > 0) 
        <div class="card-body">
    <div class="table table-responsive">
        <div class="panel-heading">
            <h4> Facturación</h4>
        </div>


              <div class="form-group row">
                    <div class="col-md-1">
                        <label for="cedula" class="control-label">Cédula/RUC</label>
                    </div>  
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="cedula" name="cedula" value="{{ $cliente->cedula }}" readonly>                                              
                    </div>                
               </div>
               <div class="form-group row">
                    <div class="col-md-1">
                        <label for="nombre" class="control-label">Nombre</label>
                    </div>  
                    <div class="col-md-5">
                        <input type="text" class="form-control input-sm" id="nombre" name="nombre" value=" {{ $cliente->nombres }}" readonly>                        
                    </div>            
               </div>
              
               <div class="form-group row">
                    <div class="col-md-1">
                        <label for="mail" class="control-label">Dirección</label>
                    </div>  
                    <div class="col-md-5">
                        <input type="text" class="form-control input-sm" id="direccion_paciente" name="direccion_paciente" 
                        placeholder="Dirección" value="{{ $cliente->direccion }}" readonly>
                    </div>
                    <div class="col-md-1">
                        <label for="tel1" class="control-label">Teléfono</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control input-sm" id="telefono_paciente" placeholder="Teléfono"
                         value="{{ $cliente->telefono }}" readonly>
                    </div>
               </div>               
               <div class="form-group row">
                    <div class="col-md-1">
                        <label for="mail" class="control-label">Fecha Emisión</label>
                    </div>  
                    <div class="col-md-5">
                        <input type="text" class="form-control input-sm" id="fecha_facturacion" name="fecha_facturacion" 
                        placeholder="Fecha" value="{{ $fecha }}" readonly>
                    </div>                    
               </div>
               <div class="table table-responsive">
                    <table class="table table-responsive table-striped table-hover table-condensed" id="examenes">
                        <thead class="bg-primary">
                            <tr>
                                <th style="width: 10%">Cant.</th>
                                <th style="text-align: center">Descripción</th>
                                <th style="width: 10%">V.Total</th>                             
                            </tr>
                        </thead>
                        <tbody id="tbodyExamenes">
                                <tr>
                                    <td>
                                        1                                                           
                                    </td>
                                    <td>
                                        Examenes de Laboratorio                                   
                                    </td>
                                    <td style="text-align: right;padding-right:20px;">
                                        {{ $total }}
                                    </td>                                   
                                </tr>
                         </tbody>    
                    </table>        
                    <table style="width: 100%;text-align: right;">
                        <tr>
                            <td style="width: 100%;text-align: right;padding-bottom:12px;">
                            <div class="row">
                                <div class="col-md-10">
                                    <label for="total" class="control-label">TOTAL A PAGAR</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="total" class="control-label">
                                        <span id="total" name="total">${{$total}}</span>
                                    </label>
                                </div>  
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;padding-right:1px;">
                                <br>
                                <input type="hidden" id="paciente_id" name="paciente_id" value="">                                    
                                <a href="{{ url('facturacion/listadoGlobal') }}" class="btn btn-secondary mr-2" style="float: right;">Cancelar</a> &nbsp;&nbsp;
                                <a href="#" style="margin-right:7px" id="imprimir" class="btn btn-info mr-2" title="Facturar">
                                    Facturar
                                </a>
                                <input type="hidden" id="factura_id" name="factura_id" value="0">         
                                <a href="#" style="margin-right:7px" id="anexo" class="btn btn-warning mr-2" title="Anexo" disabled>
                                    Anexo
                                </a>
                            </td>
                        </tr>
                    </table> 
                </div>              
            </div>   

        </div>
    @endif
</div></</div>
</div></</div></div></div>
@endsection

@section('scripts')

<link href="{{URL::asset('css/jquery-ui.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/jquery.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/orden.css')}}" rel="stylesheet">
<script src="{{ asset('/js/jquery-ui.js') }}"></script>

<script type="text/javascript">

    jQuery( "#fecha_inicio" ).datepicker({  
        dateFormat: "yy-mm-dd",
        onClose: function( selectedDate ) {
            $( "#fecha_fin" ).datepicker( "option", "minDate", selectedDate );
            $('#frmBuscar').formValidation('revalidateField', 'fecha_inicio');
          }         
    });
    
    jQuery( "#fecha_fin" ).datepicker({  
        dateFormat: "yy-mm-dd",
        onClose: function( selectedDate ) {
            $( "#fecha_inicio" ).datepicker( "option", "maxDate", selectedDate );
            $('#frmBuscar').formValidation('revalidateField', 'fecha_fin');
          }         
    });


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
                fecha_inicio: {
                     validators: {
                         notEmpty: {
                             message: 'La Fecha de Inicio es requerida y no puede ser vacía'
                         },
                         date:{  
                                format: 'YYYY-MM-DD',
                                message: 'La fecha de inicio no es válida.'                                 
                         },
                                                     
                     }
                 },
                 
                fecha_fin: {
                     validators: {
                         notEmpty: {
                             message: 'La Fecha de Fin es requerida y no puede ser vacía'
                         },
                         date: {
                             format: 'YYYY-MM-DD',
                             message: 'La fecha de fin no es válida.'
                         }                           
                     }
                },
            }
        });
    });

   $("#imprimir").click(function() {
        var token = "{{ csrf_token() }}";
        var url2 = '{!!URL::route('guardarFacturaGlobal')!!}';
        var url1 = '{{ url('facturacion/imprimirGlobal/') }}';
        
        if($('#factura_id').val()>0) {
            window.open(url1 + "/" + $('#factura_id').val(), 'popup', 'width=750,height=450');
        } else {
             $.ajax({
                type: "POST",
                url: url2,
                data: {"_token": token, cliente_id: $('#cliente_id').val(), fecha_inicio: $('#fecha_inicio').val(), fecha_fin: $('#fecha_fin').val(), 'total': {{ $total}} },
                success: function( response ) {
                        $('#factura_id').val(response);
                        $('#anexo').attr("disabled", false);
                        $("#imprimir").attr("disabled", true);
                        window.open(url1 + "/" + response, 'popup', 'width=750,height=450');
                    }
            });
        }
       
    });


   $("#anexo").click(function() {
        if($('#factura_id').val()>0) {
            var url3 = '{{ url('facturacion/anexoGlobal/') }}';
            window.open(url3 + "/" + $('#factura_id').val(), 'popup', 'width=800,height=450');
        }
   });


</script>
<style type="text/css">
    .help-block {
        color: #e74c3c;
    }
</style>

@endsection