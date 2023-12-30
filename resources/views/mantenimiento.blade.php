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
 <!-- Page Content -->
 <main>
 <section class="container d-flex flex-column">
     <div class="row">
         <div class="offset-xl-1 col-xl-2 col-lg-3 col-md-12 col-12">
             <div class="mt-4">
             <a class="navbar-brand" href="/"><img style="max-width: 50px;" src="{{ asset('assets/images/brand/logo/logo-cybergrupon.svg')}}" alt="Logo Empresa"> <span class="text-dark" translate="no">Cybergrupon</span></a>
               <!-- theme switch -->
     <div class="form-check form-switch theme-switch d-none ">
        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
      </div>
            </div>
         </div>
     </div>
  <div class="row align-items-center justify-content-center g-0 py-lg-22 py-8">
   <!-- Docs -->
   <div class="offset-xl-1 col-xl-5 col-lg-6 col-md-12 col-12 text-center text-lg-start">
    <h1 class="display-3 mb-2 fw-bold">We're coming soon. Site in update</h1>

    <p class="mb-4 fs-4">Our website is being updated. We will be here soon with our new and incredible site, if you have questions, ask our support.</p>
    <p class="mb-4 fs-4">Nuestro sitio web está en actualización. Estaremos aquí pronto con nuestro nuevo e increíble sitio, tienes dudas consulta con nuestro soporte..</p>

    <hr class="my-4">

   </div>
   <!-- img -->
   <div class="offset-xl-1 col-xl-5 col-lg-6 col-md-12 col-12 mt-8 mt-lg-0">
    <img src="../assets/images/background/comingsoon.svg" alt="commingsoon" class="w-100" />
   </div>
  </div>
  <div class="row">
    <div class="offset-xl-1 col-xl-10 col-lg-12 col-md-12 col-12">
        <div class="row align-items-center mt-6">
            <div class="col-md-6 col-8">
                <span>© <span id="copyright">
                    <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))

                    </script>
                </span>All Rights Reserved.</span>
    </div>

       </div>
    </div>
</div>
</section>
</main>

 <!-- Scripts -->
 <!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>


<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>

 <script src="../assets/js/vendors/jquery.downCount.min.js"></script>
<script src="../assets/js/vendors/countdown.js"></script>

</body>

</html>
