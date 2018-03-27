<!DOCTYPE html>
<html>
<head>
	<title>Email Code</title>
</head>
<body>
<p>Estimado {{ $demo->nombre }}, las credenciales de acceso a sus examenes son:</p>
<table style="border: 1px solid">
        <tr>
            <td rowspan="2"><img src="{{URL::asset('images/logoLab.png')}}" alt="" style="width: 180px;"></td>
            <td><h4 style="margin: 0px;">Identificación:</h6></td>
            <td><h3 style="margin: 0px;"><i> {{ $demo->cedula }} </i></h3></td>
        </tr>
        <tr>
            <td><h4 style="margin: 0px;">Código:</h6></td>
            <td><h3 style="margin: 0px;"><i>{{$demo->codigo}}</i></h3></td>
        </tr>
    </table> 
    </br>
   <p> Por favor ingrese a este <a href="http://www.laboratoriosma.com.ec/" target="_blank">link</a> </p>
    </br></br>

<p>Laboratorios Médicos Asociados</p>
</body>
</html>