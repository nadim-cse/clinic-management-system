<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/ico/favicon-16x16.png">
    <link rel="manifest" href="/images/ico/site.webmanifest">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="login">
    <div id="app">
    <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/images/logo.svg">
                        <span class="text-white text-lg ml-3">Clinic Management System<span class="font-medium"></span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            A few more clicks to 
                            <br>
                            sign in to your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white"></div>
                    </div>
                </div>
                <!-- END: Login Info -->

                <!-- Content Start -->
                    @yield('content')
                <!-- Content end -->
            </div>
        </div>
       
    </div>

     <!-- BEGIN: JS Assets-->
     <script src="{{ asset('js/app.js') }}" ></script>
        <!-- END: JS Assets-->
</body>
</html>
