<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">	
	<link href="{{URL::asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/fla.bootstrap.min.css')}}" rel="stylesheet">
	<style>
		body {
			padding-top: 70px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="#">Laboratorio Cl&iacute;nico</a>
	        </div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Administración <b class = "caret"></b>
                        </a>

                        <ul class = "dropdown-menu">
                            @if (Auth::user()->authorizeMenu(['Administrador']))
                                <li><a href="{{ url('tipopaciente') }}">Tipo Paciente</a></li>
                            @endif
                            <li><a href="{{ url('tipoexamen') }}">Tipo Examen</a></li>
                            <li><a href = "{{ url('tipousuario') }}">Tipo Usuario</a></li> 
                            <li><a href = "{{ url('entidad') }}">Entidades</a></li>                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Personas <b class = "caret"></b>
                        </a>
                        <ul class = "dropdown-menu">
                            <li><a href="{{ url('paciente') }}">Paciente</a></li>
                            <li><a href="{{ url('cliente') }}">Cliente</a></li>
                            <li><a href="{{ url('user') }}">Usuarios</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Pruebas de Laboratorio <b class = "caret"></b>
                        </a>
                        <ul class = "dropdown-menu">
                            <li><a href="{{ url('muestra') }}">Muestras</a></li>
                            <li><a href="{{ url('examen') }}">Examenes</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('orden') }}">Orden</a></li>
                    <li>
                    	 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    		Facturación<b class = "caret"></b>
                    	</a>
                    	 <ul class = "dropdown-menu">
                            <li><a href="{{ url('facturacion/individual') }}">Facturación Individual</a></li>
                            <li><a href="{{ url('facturacion/listadoGlobal') }}">Facturación Global</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('verExamen') }}">Ver  Orden</a></li>

				
					<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

					

				</ul>
			</div>

	    </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<hr/>

	<div class="container">
	    Copyright &copy; {{ date('Y') }}
	    <br/>
	</div>

	<!-- Scripts -->

	<script src="{{URL::asset('js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('js/formValidation.js')}}"></script>
	<script src="{{URL::asset('js/bootstrap.js')}}"></script>
	@yield('scripts')
</body>
</html>