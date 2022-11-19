<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @yield('title')
    </title>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/tailwind-2.css') }}" />
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/tailwind.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">

    <!-- ==== WOW JS ==== -->
    <script src="{{ Vite::asset('resources/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    @php
    setlocale(LC_TIME, 'es_ES', 'esp_esp'); 
    @endphp
