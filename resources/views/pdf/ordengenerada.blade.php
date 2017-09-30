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
		   height:60px;
		   border:0.5px solid;
		   border-color:black;
		   border-radius: 5px 5px 7px 7px;
		   margin: auto;
		   margin-top:100px;		   
		}
		#apartado2{
		   width:600px;
		   height:700px;
		   border:0.5px solid;
		   border-color:black;
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
	  	  		<td><b>Sexo: </b>{{ $paciente->genero }}</td>	  	  		
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
	  	  			{{strip_tags($item)}}
	  	  		</td>
	  	  	</tr>
	  	  </table>
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