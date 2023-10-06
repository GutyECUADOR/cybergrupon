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
    <link href="./assets/fonts/feather/feather.css" rel="stylesheet">
    <link href="./assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="./assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="./assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">




    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets/css/theme.min.css">

    <title>{{ config('app.name', 'App') }} :. Marketing & Inversiones</title>
</head>

<body class="bg-white">
    <!-- navbar login -->
    <nav class="navbar navbar-expand-lg">
        <div class="container px-0">
            <a class="navbar-brand" href="/"><img src="./assets/images/brand/google-drive.svg" alt="Logo Empresa"> <span class="text-dark">EMPRESA</span></a>
            <div class="d-flex align-items-center order-lg-3 ms-lg-3">
                <div class="d-flex align-items-center">
                    <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle me-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>

                    </a>

                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 ">Ingresar</a>
                    <a href="{{ route('register') }}" class="btn btn-primary d-none d-md-block">Registrarme</a>
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

                    <li class="nav-item">
                        <a class="nav-link" href="/">Inicio</a>
                    </li>
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarPages" data-bs-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          Nosotros
                        </a>
                        <ul class="dropdown-menu dropdown-menu-arrow dropdown-menu-end" aria-labelledby="navbarPages">
                          <li>
                            <a class="dropdown-item" href="../../pages/jobs/company-list.html">
                              Sobre nosotros
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="../../pages/jobs/post-job.html">
                              ¿Cómo funiona?
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="../../pages/jobs/upload-resume.html">
                              Preguntas Frecuentes
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="../../pages/jobs/upload-resume.html">
                              Contáctenos
                            </a>
                          </li>
              
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end " aria-labelledby="navbarDropdown">
                            <div class="list-group">
                                <a class="list-group-item list-group-item-action border-0" href="../../docs/index.html">
                                    <div class="d-flex align-items-center">
                                        <i class="fe fe-search fs-3 text-primary"></i>
                                        <div class="ms-3">
                                            <h5 class="mb-0">Marketing Digital</h5>
                                            <p class="mb-0 fs-6">
                                                Explorar opciones de marketing para tu negocio.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0" href="../../docs/bootstrap-5-snippets.html">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-cash-coin fs-3 text-primary"></i>
                                        <div class="ms-3">
                                            <h5 class="mb-0">
                                                Inversiones
                                            </h5>
                                            <p class="mb-0 fs-6">Opciones de inversión sencilla y rentable</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0" href="../../docs/changelog.html">
                                    <div class="d-flex align-items-center">
                                        <i class="fe fe-users fs-3 text-primary"></i>
                                        <div class="ms-3">
                                            <h5 class="mb-0">
                                                Referidos y Afiliados
                                            </h5>
                                            <p class="mb-0 fs-6">Conoce otras formas de emprendimiento</p>
                                        </div>
                                    </div>
                                </a>
                                
                            </div>
                        </div>
                    </li>

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
                        class="fe fe-check icon-xxs icon-shape bg-light-success text-success rounded-circle me-2"></i>Most
                      trusted marketing platform</h5>
                    <!-- heading -->
                    <h1 class="display-3 fw-bold mb-3">Bienvenido a Cybergrupon.com</h1>
                    <!-- para -->
                    <p class="pe-lg-10 mb-5">El punto de encuentro de los emprendedores más existosos del mundo.</p>
                    <!-- btn -->
                    <a href="{{ route('register') }}" class="btn btn-primary">Registrarme ahora</a>
                    <a href="https://www.youtube.com/watch?v=JRzWRZahOVU" class="popup-youtube fs-4 text-inherit ms-3">
                      <img src="./assets/images/svg/play-btn.svg" alt="play" class="me-2">Video introducción</a>
      
      
                  </div>
                </div>
                <!-- col -->
                <div class="col-lg-6 d-flex justify-content-center">
                  <!-- images -->
                  <div class="position-relative">
                    <img src="../../assets/images/background/acedamy-img/investment01.svg" alt="img" style="width: 100%" class=" ">
                    <img src="../../assets/images/background/acedamy-img/frame-1.svg" alt="frame"
                      class=" position-absolute top-0 ms-lg-n10 ms-n19">
                    <img src="../../assets/images/background/acedamy-img/frame-2.svg" alt="frame"
                      class=" position-absolute bottom-0 start-0 ms-lg-n14 ms-n6 mb-n7">
                    <img src="../../assets/images/background/acedamy-img/target.svg" alt="target"
                      class=" position-absolute bottom-0 mb-10 ms-n10 ms-lg-n1 ">
                    <img src="../../assets/images/background/acedamy-img/sound.svg" alt="sound"
                      class=" position-absolute top-0  start-0 mt-18 ms-lg-n19 ms-n8">
                    <img src="../../assets/images/background/acedamy-img/trophy.svg" alt="trophy"
                      class=" position-absolute top-0  start-0 ms-lg-n14 ms-n5">
      
                  </div>
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
                      <img src="../../assets/images/png/cta-instructor-1.png" alt="image" class="img-fluid mt-n13">
                      <div class="ms-n12 position-absolute bottom-0 start-0 mb-6">
                        <img src="../../assets/images/svg/dollor.svg" alt="dollor">
                      </div>
                      <!-- img -->
                      <div class="me-n4 position-absolute top-0 end-0">
                        <img src="../../assets/images/svg/graph.svg" alt="graph">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-12">
                  <div class="text-white p-5 p-lg-0">
                    <!-- text -->
                    <h2 class="h1 text-white">Conviertete en inversor</h2>
                    <p class="mb-0">Instructors from around the world teach millions of students on Geeks. We provide the
                      tools
                      and skills to teach what you love.</p>
                    <a href="#" class="btn btn-white mt-4">Start Teaching Today</a>
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
                      <span>Qualified Instructor</span>
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
                      <h2 class="mb-1">1.8 Billion+</h2>
                      <span>Course enrolments</span>
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
                      <h2 class="mb-1">41,000+</h2>
                      <span>Courses in 42 languages</span>
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
                      <h2 class="mb-1">179,000+</h2>
                      <span>Online Videos</span>
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
                    <h1 class="display-2 fw-bold mb-3">Learn today’s most in-<u class="text-warning"><span
                          class="text-primary">demand-skills</span></u></h1>
                    <p class="lead mb-4">Classes & Courses website template to start creating your stunning website. All
                      templates
                      are fully customizable.</p>
                    <ul class="list-unstyled mb-5">
                      <li class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--geeks-success)"
                          class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <span class="ms-2">No credit card required</span>
                      </li>
                      <li class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--geeks-success)"
                          class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <span class="ms-2">Customer service 24/7</span>
                      </li>
                      <li class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--geeks-success)"
                          class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <span class="ms-2">No setup fee</span>
                      </li>
                      <li class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="var(--geeks-success)"
                          class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                          <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <span class="ms-2">Cancel any time</span>
                      </li>
                    </ul>
                    <a href="#!" class="btn btn-dark btn-lg">Explore Online Courses</a>
                  </div>
                </div>
                <div class="col-xxl-5 offset-xxl-1 col-xl-6 col-lg-6 col-12 d-lg-flex justify-content-end">
                  <div class="mt-12 mt-lg-0 position-relative">
                    <div class="position-absolute top-0 start-0 translate-middle  d-none d-md-block">
                      <img src="../../assets/images/svg/graphics-2.svg" alt="graphics-2">
                    </div>
                    <img src="../../assets/images/education/skils.jpg" alt="online course"
                      class="img-fluid rounded-4 w-100 z-1 position-relative">
                    <div class="position-absolute top-100 start-100 translate-middle  d-none d-md-block">
                      <img src="../../assets/images/svg/graphics-1.svg" alt="graphics-1">
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
                  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis non accumsan in, tempor
                    dictum neque.</p>
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
                            What is the cost of an online course
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
                        Create beautiful website with this Geeks UI template. Get started building a site today.
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
                            What do I need to take a course?
                          </span>
                          <span class="collapse-toggle ms-4">
                            <i class="fe fe-plus text-primary"></i>
                          </span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="py-3 fs-4">
                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                        nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
                            What do I receive for taking this course?
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
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                        quinoa nesciunt laborum eiusmod.
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
                            What willI get if I subscribe to this Certificate?
                          </span>
                          <span class="collapse-toggle ms-4">
                            <i class="fe fe-plus text-primary"></i>
                          </span>
                        </a>
                      </h3>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="py-3 fs-4">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                        quinoa nesciunt laborum eiusmod.
                      </div>
                    </div>
                  </div>
                  <div class="mt-10 text-center">
                    <a href="#" class="btn btn-outline-primary">More questions? Visit the Learner Help
                      Center.</a>
                  </div>
                </div>
              </div>
            </div>
        </section>

         <!-- section -->
        
         <section class="bg-light py-7 bg-cover">
            <div class="container text-center">
      
              <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                  <div class="text-center mb-6">
                    <span class="text-uppercase text-gray-400 ls-md fw-semibold">Algunos de nuestros clientes</span>
                  </div>
                </div>
                <div class="col-xl-10 offset-xl-1">
                  <div class="table-responsive-lg">
                    <div class=" row row-cols-lg-5 row-cols-md-3 row-cols-2 g-4 flex-nowrap">
                      <div class="col">
                        <div class="text-center mb-3">
                          <img src="../../assets/images/brand/gray-logo-airbnb.svg" alt="airbnb" class="img-fluid">
                        </div>
                      </div>
                      <div class="col">
                        <div class="text-center mb-3">
                          <img src="../../assets/images/brand/gray-logo-digitalocean.svg" alt="digitalocean" class="img-fluid">
                        </div>
                      </div>
                      <div class="col">
                        <div class="text-center mb-3">
                          <img src="../../assets/images/brand/gray-logo-discord.svg" alt="discord" class="img-fluid">
                        </div>
                      </div>
                      <div class="col">
                        <div class="text-center mb-3">
                          <img src="../../assets/images/brand/gray-logo-intercom.svg" alt="intercom" class="img-fluid">
                        </div>
                      </div>
                      <div class="col">
                        <div class="text-center mb-3">
                          <img src="../../assets/images/brand/gray-logo-netflix.svg" alt="netflix" class="img-fluid">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        
    </main>
    <!-- footer -->
    <!-- footer -->
    <footer class="pt-lg-10 pt-5 footer bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- about company -->
                    <div class="mb-4">
                        <img src="./assets/images/brand/google-drive.svg" alt="LOGO" class="logo-inverse ">
                        <div class="mt-4">
                            <p>Geek is feature-rich components and beautifully Bootstrap UIKit for developers, built with bootstrap responsive framework.</p>
                            <!-- social media -->
                            <div class="fs-4 mt-4">
                                <a href="#" class="mdi mdi-facebook fs-4 text-muted me-2"></a>
                                <a href="#" class="mdi mdi-twitter text-muted me-2"></a>
                                <a href="#" class="mdi mdi-instagram text-muted "></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
                    <div class="mb-4">
                        <!-- list -->
                        <h3 class="fw-bold mb-3">Company</h3>
                        <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                            <li><a href="#" class="nav-link">About</a></li>
                            <li><a href="#" class="nav-link">Pricing</a></li>
                            <li><a href="#" class="nav-link">Blog</a></li>
                            <li><a href="#" class="nav-link">Careers</a></li>
                            <li><a href="#" class="nav-link">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="mb-4">
                        <!-- list -->
                        <h3 class="fw-bold mb-3">Support</h3>
                        <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                            <li><a href="#" class="nav-link">Help and Support</a></li>
                            <li><a href="#" class="nav-link">Become Instructor</a></li>
                            <li><a href="#" class="nav-link">Get the app</a></li>
                            <li><a href="#" class="nav-link">FAQ’s</a></li>
                            <li><a href="#" class="nav-link">Tutorial</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <!-- contact info -->
                    <div class="mb-4">
                        <h3 class="fw-bold mb-3">Get in touch</h3>
                        <p>339 McDermott Points Hettingerhaven, NV 15283</p>
                        <p class="mb-1">Email: <a href="#">support@geeksui.com</a></p>
                        <p>Phone: <span class="text-dark fw-semibold">(000) 123 456 789</span></p>

                    </div>
                </div>
            </div>
            <div class="row align-items-center g-0 border-top py-2 mt-6">
                <!-- Desc -->
                <div class="col-lg-4 col-md-5 col-12">
                    <span>© <span id="copyright2">
                            <script>
                                document.getElementById('copyright2').appendChild(document.createTextNode(new Date().getFullYear()))

                            </script>
                        </span> Geeks-UI, Inc. All Rights Reserved</span>
                </div>

                <!-- Links -->
                <div class="col-12 col-md-7 col-lg-8 d-md-flex justify-content-end">
                    <nav class="nav nav-footer">
                        <a class="nav-link ps-0" href="#">Privacy Policy</a>
                        <a class="nav-link px-2 px-md-3" href="#">Cookie Notice </a>

                        <a class="nav-link" href="#">Terms of Use</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>


    <!-- Theme JS -->
    <script src="./assets/js/theme.min.js"></script>



    <script src="./assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="./assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>

    <script src="./assets/js/vendors/tooltip.js"></script>


</body>

</html>
