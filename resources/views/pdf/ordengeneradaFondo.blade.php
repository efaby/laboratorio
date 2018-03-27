<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Orden</title>  
    <style type="text/css">
    
    	body { 
    		font-family: DejaVu Sans, sans-serif; 
    		font-size: 12px;
    	}
		
		p {
			display: block;
		}
		table{
		   padding-left:10px; width: 90%;		
		      
		}		
		td{
		   padding:2px;
		}	
		#encabezado td {
			padding: 7px 0px;
		}	
		thead{
		   width:100%;position:fixed;
		   height:109px;
		}		
		#apartado1{
		   width:750px;
		   height:40px;
		   margin: auto;
		   margin-top:150px;		   
		}
		#apartado1 table{
			line-height: 0.5em;
		}
		#apartado2{
		   width:750px;
		   height:750px;
		   margin: auto;   
		}
		#apartado3{
			width:650px;
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
		/*	padding-left:20px;
			padding-right:20px;	*/		
		}
		@page {
			size: 21cm 29.7cm;
			margin: 0;
		}
		.bg{
            background-image:url("{{asset('images/fondo.png')}}");
            background-repeat: no-repeat;
            background-size: 100%;
            margin: 0;
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
	  	  			<?php $item = str_replace('border="1"','border="0"',$item); ?>
	  	  			<?php echo $item; ?>
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