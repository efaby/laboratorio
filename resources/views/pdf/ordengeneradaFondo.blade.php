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
		#encabezado {
			padding-top:150px;	
		}	
		#apartado1{
		   width:650px;
		   height:40px;
		   border:0.5px solid;
		   border-color:white;
		   border-radius: 5px 5px 7px 7px;
		   margin: auto;	   
		}
		
		#apartado1 table{
			line-height: 0.5em;
		}
		#apartado2{
		   width:650px;
		   height:820px;
		   margin: auto;		   
		}
		#apartado3{
			width:600px;
		   	margin: auto;
		   	padding-top:10px;
		   	text-align:center;			
		}
		#apartado4{
			width:700px;
			height:10px;
			margin: auto;
		   	padding-top:5px;		   	
		   	padding-bottom:5px;
		   	text-align:right;			
		}
		#plantilla{
			padding-left:20px;
			padding-right:20px;
		}
		.bg{
            background-image:url("{{asset('images/fondo.png')}}");
            background-repeat: no-repeat;
            background-size: 100%;
        }

        @page {
			size: 21cm 29.7cm;
			margin: 0;
		}
	</style>
  </head>
  <body class="bg">
  	 <?php $i = 1; ?>	
   	  @foreach ($plantilla as $item)
   	  <div id="encabezado">
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
  	  </div>    
  	  <br>
  	  <div id="apartado2">
	  	  <table align="center">
	  	  	<tr>
	  	  		<td align="left" id="plantilla">
	  	  			<?php echo strip_tags($item, '<p><br>') ?>
	  	  		</td>
	  	  	</tr>
	  	  </table>
  	  </div>
  	  <div id="apartado4">
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