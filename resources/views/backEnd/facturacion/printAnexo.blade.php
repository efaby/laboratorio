<div id="print">
	<div class="modal-footer" style="text-align: right;">	    	   	
		<a href="javascript:imprSelec('print')" class="btn btn-default">
          Imprimir 
        </a>
        <a href="javascript:window.close()" class="btn btn-default" title="Cerrar">
	    	Cerrar
	    </a>        
	</div>
	<h2 style="text-align: center;">Cliente {{$cliente->nombres}}</h2>
	<h3 style="text-align: center;"> Pruebas de Laboratorio desde {{ $factura->fecha_inicio }} Hasta {{ $factura->fecha_fin}} </h3>
	<div class="row">
		<div class="row" style="margin-left:16px">
			<table style="width: 100%">
				<tr>
					<td style="width: 15%">Fecha</td>
					<td style="width: 40%">Nonbre</td>
					<td style="width: 35%">Prueba</td>
					<td style="width: 10%">Valor</td>
				</tr>
				@php
				    $total = 0
				@endphp
				 @foreach($ordenes as $item)
				 <tr>
				 	<td>{{ $item->fecha_emision }}</td>
				 	<td>{{ $item->paciente->nombres }} {{ $item->paciente->apellidos }}</td>
				 	<td>
				 		@foreach($item->detalleorden as $exa)
				 			{{$exa->examan->nombre}} </br>
				 		@endforeach				 		
				 	</td>
				 	<td>
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
				 <td colspan="3" style="text-align: center">Total</td>
				 <td>{{$total}}</td>
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