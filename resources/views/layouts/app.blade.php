<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        <main class="">

            @auth
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-3 col-md-3 col-lg-2  sidebar p-0" >
                            @include('layouts.sidebar')
                        </div>
                        <div class="p-0 col-9 col-md-9 col-lg-10 ">
                           @include('layouts.navbar')
                            @yield('content')
                        </div>
                    </div>
                </div>
            @endauth


        @guest
            @yield('content')
            @endguest


        </main>
    </div>

    <script type="module">
       @if(session('status'))

       window.addEventListener('load',function (){
           showToast("{{session('status')}}")
       })

           @endif
    </script>
</body>
</html>
