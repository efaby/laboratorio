<div id="print">
	<div class="modal-footer" style="text-align: right;">	    	   	
		<a href="javascript:imprSelec('print')" class="btn btn-default">
          Imprimir 
        </a>
        <a href="javascript:window.close()" class="btn btn-default" title="Cerrar">
	    	Cerrar
	    </a>        
	</div>
	@php
		$total = 0
	@endphp
	@foreach($ordenes as $item)
				
	<h2 style="text-align: center;">Detalle del Anexo</h2>
	<div class="row">
		<div class="row" style="margin-left:16px">
			<table style="width: 100%">
				<tr>
					<td style="width: 50%">
						<b>Anexo de Factura N°</b>  {{ $factura->num_factura }}
					</td>
					<td style="width: 50%">
						<b>Fecha:</b> {{ $factura->fecha_factura }}
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<b>Direccióm:</b> {{ $cliente->direccion }}
					</td>
				</tr>
				<tr>
					<td>
						<b>CI:</b> {{ $cliente->cedula }}
					</td>
					<td>
						<b>Beneficiario: </b>{{ $cliente->nombres }} {{ $cliente->apellidos }}
					</td>
				</tr>
			</table>
		</div>
	</div>		
	<br><br>
	<div class="row">
		<div class="row" style="margin-left:16px">
			<table style="width: 100%">
				<tr>
					<td style="width: 50%"><b>PRUEBA</b></td>
					<td style="width: 50%;text-align: right;"><b>PRECIO (UDS)</b></td>
				</tr>
				 <tr>
				 	<td>
				 		@foreach($item->detalleorden as $exa)
				 			{{$exa->examan->nombre}} </br>
				 		@endforeach				 		
				 	</td>
				 	<td  style="text-align: right;">
				 		@foreach($item->detalleorden as $exa)
				 			{{$exa->precio}} </br>
				 			@php
							    $total = $total + $exa->precio
							@endphp
				 		@endforeach	
				 	</td>
				 </tr>
				 @endforeach
				 <tr>
					 <td style="width: 90%;text-align: right"><b>Total</b></td>
					 <td style="width: 10%;text-align: right">{{number_format($total,2)}}</td>					 
				 </tr>
			</table>
		</div>
		<div class="row" style="margin-left:16px">
		</br>
		Atentamente,
		</br></br></br></br>
		Dra. Veronica Cantu&ntilde;a</br>
		Jefe de Laboratorio
		</div>		            
		
	</div>	    	
</div>
<script type="text/javascript">
function imprSelec(print)
{	
	var ficha=document.getElementById(print);
	var ventimp=window.open(' ','popimpr');
	ventimp.document.write(ficha.innerHTML);
	ventimp.document.close();
	ventimp.print();
	ventimp.close();}
</script>