<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
	<link href="{{URL::asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
	
	<link rel="shortcut icon" href="images/favicon.png" />
	</style>
</head>
<body>
	<div class=" container-scroller">
		<nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      		<div class="bg-white text-center navbar-brand-wrapper">
		        
      		</div>
	      	<div class="navbar-menu-wrapper d-flex align-items-center">
		        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
		          <span class="navbar-toggler-icon"></span>
		        </button>
		        <h5 style="color: #fff;">Laboratorio Cl&iacute;nico</h5>
		        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
		          <li class="nav-item">
		            <a class="nav-link profile-pic" href="#"><img class="rounded-circle" src="{{URL::asset('images/face.jpg')}}" alt=""></a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="#"><i class="fa fa-th"></i></a>
		          </li>
		        </ul>
		        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
		          <span class="navbar-toggler-icon"></span>
		        </button>
	      	</div>
    	</nav>

    	<div class="container-fluid">
      		<div class="row row-offcanvas row-offcanvas-right">
		        <!-- partial:partials/_sidebar.html -->
		        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
		          <div class="user-info">
		            <img src="{{URL::asset('images/logoLab.png')}}" alt="">
		            <p class="name">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</p>
		            <span class="online"></span>
		          </div>
		          <ul class="nav">
		          	<li class="nav-item">
                    	<a class="nav-link" href="{{ url('home') }}">
                    		<img src="{{URL::asset('images/icons/1.png')}}" alt="">
		                	<span class="menu-title">Home</span>
                    	</a>
                    </li>
		          	@if (Auth::user()->authorizeMenu(['Administrador','Analista']))
						<li class="nav-item">
	                        <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
	                        	<img src="{{URL::asset('images/icons/002-test.png')}}" alt="">
		                		<span class="menu-title">Administración<i class="fa fa-sort-down"></i></span>
	                        </a>

	                        <div class="collapse" id="admin">
		                		<ul class="nav flex-column sub-menu">
		                            @if (Auth::user()->authorizeMenu(['Administrador']))
		                                <li class="nav-item"><a class="nav-link" href="{{ url('tipopaciente') }}">Tipo Paciente</a></li>
		                            @endif    
		                            @if (Auth::user()->authorizeMenu(['Administrador','Analista']))
			                            <li class="nav-item"><a class="nav-link" href="{{ url('tipoexamen') }}">Tipo Examen</a></li>
			                        @endif    
			                        @if (Auth::user()->authorizeMenu(['Administrador']))
			                            <li class="nav-item"><a class="nav-link" href = "{{ url('tipousuario') }}">Tipo Usuario</a></li> 
			                            <li class="nav-item"><a class="nav-link" href = "{{ url('entidad') }}">Entidades</a></li>                            
			                        @endif
	                        	</ul>
	                        </div>
	                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#personas" aria-expanded="false" aria-controls="personas">
                            <img src="{{URL::asset('images/icons/014-chat.png')}}" alt="">
                            <span class="menu-title">Personas<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="personas">
	                		<ul class="nav flex-column sub-menu">
	                          	@if (Auth::user()->authorizeMenu(['Administrador','Analista','Secretaria']))
	                            	<li class="nav-item"><a class="nav-link" href="{{ url('paciente') }}">Paciente</a></li>
	                            	<li class="nav-item"><a class="nav-link" href="{{ url('cliente') }}">Cliente</a></li>
	                            @endif	
	                            @if (Auth::user()->authorizeMenu(['Administrador']))	
	                            	<li class="nav-item"><a class="nav-link" href="{{ url('user') }}">Usuarios</a></li>
	                            @endif	
	                        </ul>
	                    </div>
                    </li>

                    <li class="nav-item">
                    	@if (Auth::user()->authorizeMenu(['Administrador','Analista']))
	                        <a class="nav-link" data-toggle="collapse" href="#pruebas" aria-expanded="false" aria-controls="pruebas">
	                        <img src="{{URL::asset('images/icons/6.png')}}" alt="">
	                        <span class="menu-title">Pruebas<i class="fa fa-sort-down"></i></span>
	                        </a>
	                        <div class="collapse" id="pruebas">
		                		<ul class="nav flex-column sub-menu">
		                            <li class="nav-item"><a class="nav-link" href="{{ url('muestra') }}">Muestras</a></li>
		                            <li class="nav-item"><a class="nav-link" href="{{ url('examen') }}">Examenes</a></li>
		                        </ul>
		                    </div>
	                     @endif    
                    </li>

                    <li class="nav-item">
                    	<a class="nav-link" href="{{ url('orden') }}">
                    		<img src="{{URL::asset('images/icons/005-calendar.png')}}" alt="">
		                	<span class="menu-title">Orden</span>
                    	</a>
                    </li>

                    <li class="nav-item">
                    	<a class="nav-link" data-toggle="collapse" href="#facturacion" aria-expanded="false" aria-controls="facturacion">
                    	<img src="{{URL::asset('images/icons/005-forms.png')}}" alt="">
	                    <span class="menu-title">Facturación<i class="fa fa-sort-down"></i></span>
                    	</a>
                    	<div class="collapse" id="facturacion">
		                		<ul class="nav flex-column sub-menu">
		                            <li class="nav-item"><a class="nav-link" href="{{ url('facturacion/individual') }}">Individual</a></li>
		                            <li class="nav-item"><a class="nav-link" href="{{ url('facturacion/listadoGlobal') }}">Global</a></li>
		                        </ul>
		                    </div>
                    </li>
		          </ul>
		        </nav>
		        <div class="content-wrapper">
		        	@yield('content')
		        </div>
		        <!-- partial:partials/_footer.html -->
		        <footer class="footer">
		          <div class="container-fluid clearfix">
		            <span class="float-right">
		                Copyright &copy; {{ date('Y') }}
		            </span>
		          </div>
		        </footer>
		    </div>
    </div>
</div>

<!-- Scripts -->

	<script src="{{URL::asset('jquery/dist/jquery.min.js')}}"></script>
  	<script src="{{URL::asset('popper.js/dist/umd/popper.min.js')}}"></script>
  	<script src="{{URL::asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
  	<script src="{{URL::asset('perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  	<script src="{{URL::asset('js/hoverable-collapse.js')}}"></script>
 	<script src="{{URL::asset('js/misc.js')}}"></script>	
	
	<script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('js/formValidation.js')}}"></script>
	<script src="{{URL::asset('js/bootstrap.js')}}"></script>
	@yield('scripts')
</body>
</html>