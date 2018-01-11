<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Orden</title>  
    <style type="text/css">
		body{
		  font:11px Georgia, serif;
		}
		table{
		   padding-left:10px; width: 100%;		   
		}		
		td{
		   padding:7px;
		}		
		thead{
		   width:100%;position:fixed;
		   height:109px;
		}		
		#apartado1{
		   width:600px;
		   height:40px;
		   border:0.5px solid;
		   border-color:white;
		   border-radius: 5px 5px 7px 7px;
		   margin: auto;
		   margin-top:150px;		   
		}
		#apartado1 table{
			line-height: 0.5em;
		}
		#apartado2{
		   width:600px;
		   height:820px;
		   border:0.5px solid;
		   border-color:white;
		   border-radius: 5px 5px 7px 7px;		   
		   margin: auto;		   
		}
		#apartado3{
			width:600px;
		   	margin: auto;
		   	padding-top:10px;
		   	text-align:center;			
		}
		#plantilla{
			padding-left:20px;
			padding-right:20px;
		}
		@page {
			size: 21cm 29.7cm;
			margin: 0;
		}
	</style>
  </head>
  <body>
  	 <?php $i = 1; ?>	
   	  @foreach ($plantilla as $item)
  	  <div id="apartado1">
	  	  <table align="center">
	  	  	<tr>
	  	  		<td><b>Nombre: </b>{{ $paciente->apellidos }} {{ $paciente->nombres }}</td>
	  	  		<td><b>Edad: </b>{{ $paciente->edad }} Años</td>
	  	  		<td><b>Sexo: </b>
	  	  		@if ($paciente->genero === 'Mas')
					    Masculino
					@else
					    Femenino
					@endif
	  	  		</td>	  	  		
	  	  	</tr>
	  	  	<tr>
	  	  		<td><b>Médico: </b>{{ $orden->nombre_medico}}</td>	  	  		
	  	  		<td><b>Fecha de Recepción: </b>{{ date("d-m-Y", strtotime($orden->fecha_emision))}}</td>	  	  		
	  	  		<td><b>Fecha de Entrega: </b>{{ date("d-m-Y", strtotime($orden->fecha_entrega)) }}</td>	  	  		
	  	  	</tr>	  	  	
	  	  </table>
  	  </div>     
  	  <br>
  	  <div id="apartado2">
	  	  <table align="center">
	  	  	<tr>
	  	  		<td align="center">	
	  	  			<br>
	  	  			<b><u>RESULTADO</u></b>
	  	  			<br>  	  			
	  	  		</td>
	  	  	</tr>
	  	  	<tr>
	  	  		<td align="left" id="plantilla">
	  	  			<?php $item = str_replace('border="1"','border="0"',$item); ?>
	  	  			<?php echo strip_tags($item, '<p><br><table><tr><th><td>') ?>
	  	  		</td>
	  	  	</tr>
	  	  </table>
  	  </div>
  	  <div style="margin-left: 40px">
  	  		Validado por Dr. {{Auth::user()->nombres}} {{Auth::user()->apellidos}}
  	  </div>	
  	 
  	  <div id="apartado3">
  	  		Página {{$i}}/{{count($plantilla)}}
  	  </div>
  	  	@if (count($plantilla) != $i)
  	  		<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>
  	  	@endif	
  	  	<?php $i++; ?>
  	  @endforeach     
  </body>
</html>