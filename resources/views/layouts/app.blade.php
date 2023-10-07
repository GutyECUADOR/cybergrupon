<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Codescandy">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        // Render blocking JS:
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);

    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/libs/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet" >
    <link href="{{ asset('assets/fonts/feather/feather.css')}}" rel="stylesheet" >
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css')}}" rel="stylesheet" >
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" >
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" >



    <!-- Theme CSS -->
    <link href="{{ asset('assets/css/theme.min.css')}}" rel="stylesheet" >
    <title>{{ config('app.name', 'App') }} :. Panel de Administración</title>
</head>

<body>

    {{ $slot }}

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>



    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js')}}"></script>
    <script src="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendors/flatpickr.js')}}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendors/chart.js')}}"></script>


</body>

</html>

