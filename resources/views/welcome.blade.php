<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laboratorios Médicos Asociados</title>

        <!-- Fonts -->
    <link href="{{ asset('publico/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('publico/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('publico/plugins/cubeportfolio/css/cubeportfolio.min.css') }}">
    <link href="{{ asset('publico/css/nivo-lightbox.css') }}" rel="stylesheet" />
    <link href="{{ asset('publico/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css') }}" />
    <link href="{{ asset('publico/css/owl.carousel.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('publico/css/owl.theme.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('publico/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('publico/css/style.css') }}" rel="stylesheet">

    <!-- boxed bg -->
    <link id="bodybg" href="{{ asset('publico/bodybg/bg1.css') }}" rel="stylesheet" type="text/css" />
    <!-- template skin -->
    <link id="t-colors" href="{{ asset('publico/css/blue.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    </head>
    
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div id="wrapper">

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="top-area">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <p class="bold text-left">Lunes - Sabado, 7am to 7pm </p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <p class="bold text-right">Llámenos +032999999</p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="container navigation">

                <div class="navbar-header page-scroll">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                  <a class="navbar-brand" >
                            <img src="{{URL::asset('images/logoPub.png')}}" alt="" width="150" height="40" />
                        </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#intro">Home</a></li>
                    <li><a href="#service">Servicios</a></li>
                    <li><a href="{{ url('/login') }}" target="_blank">Ingreso al Sistema</a></li>
                  </ul>
                </div>
                <!-- /.navbar-collapse -->
              </div>
              <!-- /.container -->
            </nav>

            <!-- Section: intro -->
            <section id="intro" class="intro">
              <div class="intro-content">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                        <h2 class="h-ultra">Laboratorios Médicos Asociados</h2>
                      </div>
                      <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                        <h4 class="h-light">Servicios de Diagnostico por Laboratorio</h4>
                      </div>
                      <div class="well well-trans">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">

                          <ul class="lead-list">
                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Affordable monthly premium packages</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Choose your favourite doctor</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Only use friendly environment</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
                          </ul>
                          
                        </div>
                      </div>


                    </div>
                    <div class="col-lg-6">
              <div class="form-wrapper">
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                  <div class="panel panel-skin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Ver mis examenes de Laboratorio! <small>(Online!)</small></h3>
                    </div>
                    <div class="panel-body">
                      <div id="sendmessage"></div>
                      <div id="errormessage"></div>
                      <br>
                      <form action="" method="post" role="form" class="contactForm lead" id="frmBuscar">
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Identificación</label>
                              <input type="text" name="identificacion" id="identificacion" class="form-control input-md" maxlength="13">
                              <div class="validation"></div>
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Código</label>
                              <input type="text" name="codigo" id="codigo" class="form-control input-md" maxlength="7" >
                              <div class="validation"></div>
                            </div>
                          </div>
                        </div>

                       <input type="submit" data-toggle="modal" data-target="#myModal" data-backdrop="static" value="Buscar" class="btn btn-skin btn-block btn-lg disabled">
                        <p class="lead-footer">* Para la visualización de sus examenes es necesario poseer el código de seguridad.</p>

                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- /Section: intro -->

            <!-- Section: boxes -->
            <section id="boxes" class="home-section paddingtop-80">

              <div class="container">
                <div class="row">
                  <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                      <div class="box text-center">

                        <i class="fa fa-check fa-3x circled bg-skin"></i>
                        <h4 class="h-bold">Confiabilidad</h4>
                        <p>
                         
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                      <div class="box text-center">

                        <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                        <h4 class="h-bold">Informes</h4>
                        <p>
                       
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                      <div class="box text-center">
                        <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                        <h4 class="h-bold">Especialistas</h4>
                        <p>
                        
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 col-md-3">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                      <div class="box text-center">

                        <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                        <h4 class="h-bold">Diagnóstico</h4>
                        <p>
                         
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </section>
            <!-- /Section: boxes -->


            <!-- Section: services -->
            <section id="service" class="home-section nopadding paddingtop-60">

              <div class="container">

                <div class="row">
                  <div class="col-sm-6 col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                      <img src="{{URL::asset('publico/img/dummy/img-1.jpg') }}" class="img-responsive" alt="" />
                    </div>
                  </div>
                  <div class="col-sm-3 col-md-3">

                    <div class="wow fadeInRight" data-wow-delay="0.1s">
                      <div class="service-box">
                        <div class="service-icon">
                          <span class="fa fa-stethoscope fa-3x"></span>
                        </div>
                        <div class="service-desc">
                          <h5 class="h-light">Medical checkup</h5>
                          <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                        </div>
                      </div>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.2s">
                      <div class="service-box">
                        <div class="service-icon">
                          <span class="fa fa-wheelchair fa-3x"></span>
                        </div>
                        <div class="service-desc">
                          <h5 class="h-light">Nursing Services</h5>
                          <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                        </div>
                      </div>
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.3s">
                      <div class="service-box">
                        <div class="service-icon">
                          <span class="fa fa-plus-square fa-3x"></span>
                        </div>
                        <div class="service-desc">
                          <h5 class="h-light">Pharmacy</h5>
                          <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="col-sm-3 col-md-3">

                    <div class="wow fadeInRight" data-wow-delay="0.1s">
                      <div class="service-box">
                        <div class="service-icon">
                          <span class="fa fa-h-square fa-3x"></span>
                        </div>
                        <div class="service-desc">
                          <h5 class="h-light">Gyn Care</h5>
                          <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                        </div>
                      </div>
                    </div>

                    <div class="wow fadeInRight" data-wow-delay="0.2s">
                      <div class="service-box">
                        <div class="service-icon">
                          <span class="fa fa-filter fa-3x"></span>
                        </div>
                        <div class="service-desc">
                          <h5 class="h-light">Neurology</h5>
                          <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                        </div>
                      </div>
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.3s">
                      <div class="service-box">
                        <div class="service-icon">
                          <span class="fa fa-user-md fa-3x"></span>
                        </div>
                        <div class="service-desc">
                          <h5 class="h-light">Sleep Center</h5>
                          <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
            </section>
            <!-- /Section: services -->

            <footer>

              <div class="container">
                <div class="row">
                  <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                      <div class="widget">
                        <h5>About Medicio</h5>
                        <p>
                          Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                        </p>
                      </div>
                    </div>
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                      <div class="widget">
                        <h5>Information</h5>
                        <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">Laboratory</a></li>
                          <li><a href="#">Medical treatment</a></li>
                          <li><a href="#">Terms & conditions</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                      <div class="widget">
                        <h5>Medicio center</h5>
                        <p>
                          Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                        </p>
                        <ul>
                          <li>
                            <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                                        </span> Monday - Saturday, 8am to 10pm
                          </li>
                          <li>
                            <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                        </span> +62 0888 904 711
                          </li>
                          <li>
                            <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                        </span> hello@medicio.com
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                      <div class="widget">
                        <h5>Our location</h5>
                        <p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>

                      </div>
                    </div>
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                      <div class="widget">
                        <h5>Follow us</h5>
                        <ul class="company-social">
                          <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                          <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sub-footer">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="text-left">
                          <p>&copy;Copyright. All rights reserved.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="wow fadeInRight" data-wow-delay="0.1s">
                        <div class="text-right">
                          <div class="credits">
                            <!--
                              All the links in the footer should remain intact. 
                              You can delete the links only if you purchased the pro version.
                              Licensing information: https://bootstrapmade.com/license/
                              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medicio
                            -->
                            <a href="https://bootstrapmade.com/bootstrap-education-templates/">Bootstrap Education Templates</a> by BootstrapMade
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </footer>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-lg"  >
                    <div class="modal-content" >
                        <div class="modal-header">
                        </div>
                    </div>
                </div>  
            </div>

          </div>
          <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

          <!-- Core JavaScript Files -->
          <script src="{{ asset('publico/js/jquery.min.js') }}"></script>
          <script src="{{ asset('publico/js/bootstrap.min.js') }}"></script>
          <script src="{{ asset('publico/js/jquery.easing.min.js') }}"></script>
          <script src="{{ asset('publico/js/wow.min.js') }}"></script>
          <script src="{{ asset('publico/js/jquery.scrollTo.js') }}"></script>
          <script src="{{ asset('publico/js/jquery.appear.js') }}"></script>
          <script src="{{ asset('publico/js/stellar.js') }}"></script>
          <script src="{{ asset('publico/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
          <script src="{{ asset('publico/js/owl.carousel.min.js') }}"></script>
          <script src="{{ asset('publico/js/nivo-lightbox.min.js') }}"></script>
          <script src="{{ asset('publico/js/custom.js') }}"></script>
          <script src="{{URL::asset('js/formValidation.js')}}"></script>
          <script src="{{URL::asset('js/bootstrap.js')}}"></script>
<script type="text/javascript">
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
                            regexp: /^[0-9]+$/,
                            message: 'Ingrese un Número de Identificación válido.'
                        }                               
                    }
                },
                codigo: {
                   message: 'El Código no es valido',
                   validators: {
                       notEmpty: {
                           message: 'El Código no puede ser vacío.'
                       },
                       regexp: {
                           regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/,
                           message: 'Ingrese un Código válido.'
                       }
                   }
               },
            }
        });

       $("#frmBuscar").on('submit', function(evt){
        evt.preventDefault();  
        // tu codigo aqui
        return false;
     });

    });



    $('#myModal').on('show.bs.modal', function (evnt) {
      var url5 = '{!!URL::route('verExamenForm')!!}';
      var urlModal = url5 + "?identificacion="+$("#identificacion").val()+"&codigo="+$("#codigo").val();
      $('.modal-content').load(urlModal,function(result){     
      });
    });

</script>
<style type="text/css">
  small, .small {
    font-size: 10px;
}
</style>
</body>

</html>

