<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Marketing Digital & Publicidad">
    <meta name="keywords" content="Marketing Digital & Publicidad">
    <meta name="author" content="Sphera Dev">

    <script>
        // Render blocking JS:
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);

    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/favicon.ico">

    <!-- Libs CSS -->
    <link href="{{ asset('assets/libs/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet" >
    <link href="{{ asset('assets/fonts/feather/feather.css')}}" rel="stylesheet" >
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css')}}" rel="stylesheet" >
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" >
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme CSS -->
    <link href="{{ asset('assets/css/theme.min.css')}}" rel="stylesheet" >
    <link href="{{ asset('assets/css/custom.css')}}?<?php echo date('Ymdhiiss')?>" rel="stylesheet" >

    <title>{{ config('app.name', 'App') }} :. Marketing & Publicidad</title>
</head>

<body class="bg-white">
    <!-- navbar login -->
    <nav class="navbar navbar-expand-lg">
        <div class="container px-0">
            <a class="navbar-brand" href="/"><img style="max-width: 50px;" src="{{ asset('assets/images/brand/logo/logo-cybergrupon.svg')}}" alt="Logo Empresa"> <span class="text-dark" translate="no">Cybergrupon</span></a>
            <div class="d-flex align-items-center order-lg-3 ms-lg-3">
                <div class="d-flex align-items-center">
                    <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle me-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>

                    </a>
                    <div id="google_translate_element"></div>
                    <a href="{{ route('login') }}" style="margin-left: 10px;" class="btn btn-outline-primary me-2 ">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-primary d-none d-md-block">{{ __('Register') }}</a>

                </div>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar top-bar mt-0"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
            <!-- Button -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbar-default">
                <ul class="navbar-nav ms-auto">

                </ul>


            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        <section class="bg-light py-lg-14 py-7 bg-cover">
            <!-- container -->
            <div class="container">
              <!-- row -->
              <div class="row align-items-center">
                <!-- col -->
                <div class="col-lg-6 mb-6 mb-lg-0">
                  <div class="">
                    <!-- heading -->
                    <h5 class="text-dark mb-4"><i
                        class="fe fe-check icon-xxs icon-shape bg-light-success text-success rounded-circle me-2"></i>La más
                      efectiva plataforma de marketing</h5>
                    <!-- heading -->
                    <h1 class="display-3 fw-bold mb-3">Bienvenido a Cybergrupon.com</h1>
                    <!-- para -->
                    <p class="pe-lg-10 mb-5">El punto de encuentro de los emprendedores más existosos del mundo.</p>
                    <!-- btn -->
                    <a href="{{ route('register') }}" class="btn btn-primary">Registrarme ahora</a>

                  </div>
                </div>
                <!-- col -->
                <div class="col-lg-6 d-flex justify-content-center">
                    <iframe style="width: 100%;
                    height: 400px;
                    border: 6px solid #CCCCCC;
                    border-radius: 25px;"
                    src="https://youtube.com/embed/Rs-PC7KtFAQ?autoplay=1&controls=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                </div>
              </div>
            </div>
        </section>

        <section class="my-lg-14 mb-8">
            <!-- container -->
            <div class="container bg-primary rounded-3">
              <!-- row -->
              <div class="row align-items-center">
                <!-- col -->
                <div class="col-lg-6 col-12 d-none d-lg-block">
                  <div class="d-flex justify-content-center ">
                    <!-- img -->
                    <div class="position-relative">
                      <img src="{{ asset('assets/images/png/cta-instructor-1.png')}}" alt="image" class="img-fluid mt-n13">
                      <div class="ms-n12 position-absolute bottom-0 start-0 mb-6">
                        <img src="{{ asset('assets/images/svg/dollor.svg')}}" alt="dollor">
                      </div>
                      <!-- img -->
                      <div class="me-n4 position-absolute top-0 end-0">
                        <img src="{{ asset('assets/images/svg/graph.svg')}}" alt="graph">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-12">
                  <div class="text-white p-5 p-lg-0">
                    <!-- text -->
                    <h2 class="h1 text-white">COMPRA YA TU PAQUETE</h2>
                    <p class="mb-0">Compra tu paquete de publicidad y obten grandes beneficios. Notros te ayudamos paso a paso en todo el proceso.</p>
                    <a href="{{ route('register')}}" class="btn btn-white mt-4">Comienza a pautar hoy</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="container">
              <!-- row -->
              <div class="row">
                <div class="col-md-6 col-lg-3 border-top-md border-bottom border-end-md ">
                  <!-- text -->
                  <div class="py-7 text-center">
                    <div class="mb-3">
                      <i class="fe fe-award fs-2 text-info"> </i>
                    </div>
                    <div class="lh-1">
                      <h2 class="mb-1">316,000+</h2>
                      <span>Ventas</span>
                    </div>
                  </div>

                </div>
                <div class="col-md-6 col-lg-3 border-top-md border-bottom border-end-lg ">
                  <!-- icon -->
                  <div class="py-7 text-center">
                    <div class="mb-3">
                      <i class="fe fe-users fs-2 text-warning"> </i>
                    </div>
                    <!-- text -->
                    <div class="lh-1">
                      <h2 class="mb-1">1.8 Milliones+</h2>
                      <span>Ganancias Globales</span>
                    </div>
                  </div>

                </div>
                <div class="col-md-6 col-lg-3 border-top-lg border-bottom border-end-md ">
                  <!-- icon -->
                  <div class="py-7 text-center">
                    <div class="mb-3">
                      <i class="fe fe-tv fs-2 text-primary"> </i>
                    </div>
                    <!-- text -->
                    <div class="lh-1">
                      <h2 class="mb-1">5,000+</h2>
                      <span>Paginas de contacto</span>
                    </div>
                  </div>

                </div>
                <div class="col-md-6 col-lg-3 border-top-lg border-bottom ">
                  <!-- icon -->
                  <div class="py-7 text-center">
                    <div class="mb-3">
                      <i class="fe fe-film fs-2 text-success"> </i>
                    </div>
                    <!-- text -->
                    <div class="lh-1">
                      <h2 class="mb-1">10,000+</h2>
                      <span>Videos de publicidad</span>
                    </div>
                  </div>

                </div>

              </div>
            </div>
        </section>



        <section class="bg-light py-lg-14 py-7 bg-cover">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class=" col-xxl-5  col-xl-6 col-lg-6 col-12">
                  <div>
                    <h1 class="display-2 fw-bold mb-3">Comienza hoy mismo y <u class="text-warning"><span
                          class="text-primary">Gana mucho dinero</span></u></h1>
                    <p class="lead mb-4">Genera publicidad para tu negocio tradicional
                    invita a personas a que hagan lo mismo nosotros te apoyamos</p>
                    <ul class="list-unstyled mb-5">
                      <li class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--geeks-success)"
                          class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <span class="ms-2">Publicidad facil y rapida a tu negocio</span>
                      </li>
                      <li class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--geeks-success)"
                          class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <span class="ms-2">Servicio 24/7</span>
                      </li>
                      <li class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--geeks-success)"
                          class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <span class="ms-2">Facil manejo</span>
                      </li>
                      <li class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--geeks-success)"
                          class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <span class="ms-2">Invita y gana</span>
                      </li>
                    </ul>
                    <a href="#!" class="btn btn-dark btn-lg">Toma esta gran oportunidad</a>
                  </div>
                </div>
                <div class="col-xxl-5 offset-xxl-1 col-xl-6 col-lg-6 col-12 d-lg-flex justify-content-end">
                  <div class="mt-12 mt-lg-0 position-relative">
                    <div class="position-absolute top-0 start-0 translate-middle  d-none d-md-block">
                      <img src="{{ asset('assets/images/svg/graphics-2.svg')}}" alt="graphics-2">
                    </div>
                    <img src="{{ asset('assets/images/education/skils.jpg')}}" alt="online course"
                      class="img-fluid rounded-4 w-100 z-1 position-relative">
                    <div class="position-absolute top-100 start-100 translate-middle  d-none d-md-block">
                      <img src="{{ asset('assets/images/svg/graphics-1.svg')}}" alt="graphics-1">
                    </div>

                  </div>
                </div>
              </div>
            </div>
        </section>

        <section class="py-7 py-lg-18">
            <div class="container">
              <div class="row mb-8 justify-content-center">
                <div class="col-lg-6 col-md-12 col-12 text-center">
                  <!-- caption -->
                  <span class="text-primary mb-3 d-block text-uppercase fw-semibold ls-xl">Necesito saber</span>
                  <h2 class="mb-2 display-4 fw-bold ">Preguntas frecuentes.</h2>
                  <p class="lead">Te ayudamos a contruir una imagen fuerte para tu empresa y
                    ganas dinero por invitar a mas empresarios.</p>
                </div>
              </div>
              <!-- row -->
              <div class="row justify-content-center ">
                <div class="col-lg-6 col-md-8 col-12">
                  <div class="accordion accordion-flush" id="accordionExample">
                    <div class="border-bottom py-3" id="headingOne">
                      <h3 class="mb-0 fw-bold">
                        <a href="#" class="d-flex align-items-center text-inherit text-decoration-none active"
                          data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                          aria-controls="collapseOne">
                          <span class="me-auto">
                            Cual es el costo de la publicidad?
                          </span>
                          <span class="collapse-toggle ms-4">
                            <i class="fe fe-plus text-primary"></i>
                          </span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample">
                      <div class="py-3 fs-4">
                        El costo es mas bajo de toda la publicidad del mercado, lo puedes hacer sencillo y rapido.
                      </div>
                    </div>
                    <!-- Card  -->
                    <!-- Card header  -->
                    <div class="border-bottom py-3" id="headingTwo">
                      <h3 class="mb-0 fw-bold">
                        <a href="#" class="d-flex align-items-center text-inherit text-decoration-none"
                          data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                          aria-controls="collapseTwo">
                          <span class="me-auto">
                            En verdad necesito publicidad para mi negocio?
                          </span>
                          <span class="collapse-toggle ms-4">
                            <i class="fe fe-plus text-primary"></i>
                          </span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="py-3 fs-4">
                        El mundo esta lleno de sitios nuevos y grandes marcas, la unica forma de resaltar
                        es aprovechando las nuevas tecnologias para llegar a todos los clientes posibles.
                      </div>
                    </div>
                    <!-- Card  -->
                    <!-- Card header  -->
                    <div class="border-bottom py-3 " id="headingThree">
                      <h3 class="mb-0 fw-bold">
                        <a href="#" class="d-flex align-items-center text-inherit text-decoration-none active"
                          data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                          aria-controls="collapseThree">
                          <span class="me-auto">
                            Como puedo ganar dinero con el sistema?
                          </span>
                          <span class="collapse-toggle ms-4">
                            <i class="fe fe-plus text-primary"></i>
                          </span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                      data-bs-parent="#accordionExample">
                      <div class="py-3 fs-4">
                        Asi como alguien compartio contigo esta oportunidad de crecer, puedes hacer lo mismo
                        por o tros empresarios que estan buscando el exito financiero y ganas grandes conisiones hasta el 100%.
                      </div>
                    </div>
                    <!-- Card  -->
                    <!-- Card header  -->
                    <div class="pt-3 " id="headingFour">
                      <h3 class="mb-0 fw-bold">
                        <a href="#" class="d-flex align-items-center text-inherit text-decoration-none active"
                          data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                          aria-controls="collapseFour">
                          <span class="me-auto">
                            Como puedo cobrar mis comisiones?
                          </span>
                          <span class="collapse-toggle ms-4">
                            <i class="fe fe-plus text-primary"></i>
                          </span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="py-3 fs-4">
                        Las comisiones puedes cobrarlas en criptomonedas en cuestion de momentos, en banco aunque sea un poquito mas lento
                        y por otros medios de pago sencillos y accequibles sin importar tu pais.
                      </div>
                    </div>
                  </div>
                  <div class="mt-10 text-center">
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalterminos">Más preguntas? Revisa nuestros terminos y condiciones</a>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </main>
    
    <!-- modal -->
    <div class="modal fade" id="modalpromo" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        @foreach ($linksPublicidad as $publicidad)
                            <div class="col col-md-6 text-center">
                                <iframe width="100%" height="200px"
                                    src="{{ $publicidad->link_publicidad }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                                <a href="{{ $publicidad->link_redireccion }}" target="_blank" class="btn btn-success btn-sm mt-3 mb-3">Más información</a>
                            </div>
                        @endforeach
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <x-modal-terminos></x-modal-terminos>
    <x-whatsapp-fab></x-whatsapp-fab>

    <!-- Scripts -->
    <!-- Libs JS -->

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js')}}"></script>

    <script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js')}}"></script>
    <script src="{{ asset('assets/libs/@popperjs/core/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('assets/libs/tippy.js/dist/tippy-bundle.umd.min.js')}}"></script>
    <script src="{{ asset('assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendors/tooltip.js')}}"></script>
    <script src="{{ asset('assets/js/vendors/popup.js')}}"></script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script type="text/javascript">
        $(window).on('load', function() {

            $(".goog-logo-link").empty();
            $('.goog-te-gadget').html($('.goog-te-gadget').children());

            let selectElement = document.querySelector('.goog-te-combo');
            // Agrega la clase "form-select" al elemento
            selectElement.classList.add('form-select');
            selectElement.classList.add('text-dark');
            if (window.navigator.language) {
                //document.querySelector('.goog-te-combo').value=window.navigator.language;
            }

            console.log(window.navigator.language);

            $('#modalpromo').modal('show');
            $('[data-toggle="popover"]').popover()
            $("#whatspopover").popover("show");

            $("#modalpromo").on('hidden.bs.modal', function (e) {
                $("#modalpromo iframe").attr("src", $("#modalpromo iframe").attr("src"));
                $('#modal-fin').modal('show');
            });
        });
    </script>

    <script>
        function googleTranslateElementInit(){
            new google.translate.TranslateElement(
                {pageLanguaje: 'en'},
                'google_translate_element'
            )
        }

    </script>

</body>

</html>
