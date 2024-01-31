<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>{{ config('app.name','') }}</title>
    <link rel="stylesheet" href="{{ asset('ui/assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/superclasses.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('ui/assets/css/mobile.css') }}">
</head>
<body>
    <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- HEADER CON -->
    <header class="w-100 float-left header-con">
        <div class="wrapper">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('ui/assets/images/GATITO NEGRO.png') }}" alt="logo-icon"></a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link  p-0" href="{{ route('dashboard') }}">Administración</a>
                        </li>
                        <li class="nav-item active">
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="nav-link p-0" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Cerrar sesión</a>
                                
                            </form>

                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link  p-0" href="{{ route('inicio') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-0" href="{{ route('register') }}">Registro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-0" href="{{ route('login') }}">Acceder</a>
                        </li>
                    </ul>
                    @endauth
                    <div class="generic-btn white-btn header-btn">
                        
                    </div>
                    <div class="social-icon">
                        <ul class="list-unstyled mb-0 d-flex">
                            <li><a href="https://www.facebook.com/profile.php?id=100078810006351&locale=es_LA" target="_blanck"><i
                                        class="fab fa-facebook-f d-flex align-items-center justify-content-center"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- HEADER CON -->

    <!-- HELP SECTION -->
    <section class="w-100 float-left help-con padding-top padding-bottom">
        <div class="container position-relative">
            <div id="light">
                <a class="boxclose" id="boxclose" onclick="lightbox_close();"></a>
                
                <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F100078810006351%2Fvideos%2F139674105720000%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-6 d-flex align-items-center order-md-0 order-2">
                    <div class="wrok-content">
                        <span class="d-block" data-aos="fade-up" data-aos-duration="600">Los campeones no son quiénes nunca fallan, son quiénes nunca se rinden.</span>
                        
                        <h2 data-aos="fade-up" data-aos-duration="600">BIENVENIDO A CENTRO RECREACIONAL <br><span class="position-relative text-border"> GATITO NEGRO</span></h2>
                        <p data-aos="fade-up" data-aos-duration="600">Canchas de césped natural eventos y más</p>
                        <div class="phone-con d-inline-block" data-aos="fade-up" data-aos-duration="600">
                                <a href="tel:+0984805154" class="d-flex align-items-center">
                                    <figure class="mb-0 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('ui/assets/images/headephone-icon.png') }}" alt="headephone-icon">
                                    </figure>
                                    <div class="phone-text">
                                        <span class="d-block">Contactanos para reservar</span>
                                        <small class="d-block">0984805154</small>
                                    </div>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 d-flex align-items-center justify-content-center order-md-0 order-1" data-aos="fade-up" data-aos-duration="600">
                    
                    <div id="fade1" onClick="lightbox_close();"></div>
                    <div class="vedio-img">
                        <a href="javascript:void(0)" onclick="lightbox_open();" class="position-relative black-layer">
                            <img class="thumb poster-con index1-poster" style="cursor: pointer;"
                                src="{{ asset('ui/assets/images/balon-futbol.jpg') }}" alt="vedio-img">
                            <div class="video-wrap position-absolute">
                                <img src="{{ asset('ui/assets/images/play-icon.png') }}" alt="play-icon">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- HELP SECTION -->
    <!-- PRODUCT SECTION -->
    <section class="w-100 float-left product-con plant-img">
        <div class="container position-relative">
            <div class="padding-top padding-bottom">
                <div class="generic-title text-center ml-auto mr-auto">
                    <span class="d-block" data-aos="fade-up" data-aos-duration="600">RESERVA NUESTROS PRODUCTOS Y SERVICIOS</span>
                    <h2 data-aos="fade-up" data-aos-duration="600">CANCHAS Y RECEPCIONES</h2>
                </div>
                <div class="owl-carousel owl-theme text-center" id="product-slider" data-aos="fade-up" data-aos-duration="600">
                    @foreach ($servicios as $cancha)
                        <div class="item">
                            <div class="product-item">
                                <div class="product-img">
                                    <figure>
                                        <img src="{{ route('servicios.ver-foto',[$cancha->id,1]) }}" alt="product-img" width="175px" height="150px">
                                    </figure>
                                    <div class="cart-btn">
                                        <a href="{{ route('reserva.detalle',$cancha->id) }}">RESERVAR</a>
                                    </div>
                                </div>
                                <div class="product-detail">
                                    <div class="star-img">
                                        <strong>{{ $cancha->nombre }}</strong>
                                    </div>
                                    <h3>{{ $cancha->tipoReserva->nombre }}</h3>
                                    <div class="product-price">
                                        ${{ $cancha->precio_hora }} la hora. <br>
                                        Capacidad para {{ $cancha->capacidad_personas }} personas.
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                 
                    
                   
                </div>
                <div class="btn-wrap">
                    <button class="prev-btn clip-each border-style-thin"><i class="fas fa-arrow-left"></i></button>
                    <button class="next-btn clip-each border-style-thin"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    
    <!-- PRODUCT SECTION -->

    <section class="w-100 float-left work-con">
        <div class="container position-relative">
            <div class="padding-bottom">
                <div class="generic-title text-center ml-auto mr-auto">
                    <h2></h2>
                    <h1 class="d-block" data-aos="fade-up" data-aos-duration="600">PRECIOS DE CANCHAS</h1>
                    <h3 data-aos="fade-up" data-aos-duration="600">Por hora de cancha: $ 12.00 <br>Por partido de cancha: $ 10.00 <br></h3>
                    <h2></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- WORK SECTION -->
    
    <!-- FOOTER SECTION -->
    <section class="w-100 float-left footer-con">
        <div class="container">
            <div class="footer-inner-con">
                <div class="site-map footer-content">
                    <div class="footre-logo">
                        <a href="{{ url('/') }}">
                            <figure>
                                <img src="{{ asset('ui/assets/images/GATITO NEGRO.png') }}" alt="footer-logo">
                            </figure>
                        </a>
                    </div>
                    <p>{{ config('app.name') }}</p>
                    <p>
                        <small>
                            Canchas de césped natural eventos y más.
                        </small>
                    </p>
                    <span class="copyright d-block">Copyright {{ date('Y') }}, {{ config('app.name','') }}
                        Derechos reservados.</span>
                    <div class="footer-social-con">
                        <ul class="list-unstyled mb-0">
                            <li><a href="https://www.facebook.com/profile.php?id=100078810006351&locale=es_LA" target="_blanck"><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>                        
                </div>
                <div class="site-map footer-link">
                    <h4>Enlaces rapidos</h4>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('inicio') }}"><i class="fas fa-angle-right"></i> Inicio</a></li>
                        <li><a href="{{ route('register') }}"><i class="fas fa-angle-right"></i> Registro</a></li>
                        <li><a href="{{ route('login') }}"><i class="fas fa-angle-right"></i> Acceder</a></li>
                    </ul>
                </div>
                <div class="site-map contact-info">
                    <h4>Información de contacto</h4>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <span class="d-block">Dirección:</span>
                            Cotopaxi, Salcedo, Mulliquindil (Santa Ana) o el barrio Sur San Miguel.
                        </li>
                        <li>
                            <span class="d-block">Email:</span>
                            <a href="mailto:info@gatitonegro.com">info@gatitonegro.com</a>
                        </li>
                        <li>
                            <span class="d-block">WhatsApp:</span>
                            <a href="tel:+0984805154">0984805154</a>
                        </li>
                    </ul>
                </div>
                <div class="site-map">
                    <h4>Ubicación</h4>
                    
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.1657015020883!2d-78.56534786971183!3d-1.0363269541580593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d465e3cc34bfcf%3A0xc121330e35ce6c4!2sCentro%20Recreacional%20%22Gatito%20Negro%22!5e0!3m2!1ses-419!2sec!4v1706278204191!5m2!1ses-419!2sec" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
                </div>
            </div>
        </div>
    </section>
    <a id="button"></a>
    <!-- FOOTER SECTION -->
    <script src="{{ asset('ui/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('ui/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('ui/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ui/assets/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('ui/assets/js/aos.js') }}"></script>
    <script src="{{ asset('ui/assets/js/custom.js') }}"></script>
    <script>
        $('#service-slider').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        })


        $('#product-slider').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                767: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })

        $('#testimonials-slider').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        })

        var owl = $(".owl-carousel");
        owl.owlCarousel();
        $(".next-btn").click(function () {
            owl.trigger("next.owl.carousel");
        });
        $(".prev-btn").click(function () {
            owl.trigger("prev.owl.carousel");
        });
        $(".prev-btn").addClass("disabled");
        $(owl).on("translated.owl.carousel", function (event) {
            if ($(".owl-prev").hasClass("disabled")) {
                $(".prev-btn").addClass("disabled");
            } else {
                $(".prev-btn").removeClass("disabled");
            }
            if ($(".owl-next").hasClass("disabled")) {
                $(".next-btn").addClass("disabled");
            } else {
                $(".next-btn").removeClass("disabled");
            }
        });
        window.document.onkeydown = function (e) {
            if (!e) {
                e = event;
            }
            if (e.keyCode == 27) {
                lightbox_close();
            }
        }

        function lightbox_open() {
            var lightBoxVideo = document.getElementById("VisaChipCardVideo");
            //   window.scrollTo(0, 0);
            document.getElementById('light').style.display = 'block';
            document.getElementById('fade1').style.display = 'block';
            lightBoxVideo.play();
        }

        function lightbox_close() {
            var lightBoxVideo = document.getElementById("VisaChipCardVideo");
            document.getElementById('light').style.display = 'none';
            document.getElementById('fade1').style.display = 'none';
            lightBoxVideo.pause();
        }
    </script>
    <script>

        // function makeActive() {
        //       var element = document.getElementById("text");
        //       element.classList.add("active");
        //       element.innerHTML="This is Active";
        //    }
        $('.factory-btn').on('click', function () {
            $(this).addClass('fctory').nextsiblings().removeClass('fctory');
        });
    </script>
    <script>AOS.init();</script>
</body>
</html>