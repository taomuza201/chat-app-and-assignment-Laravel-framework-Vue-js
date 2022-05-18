<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('icon/octopus.png') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/template.bundle.css') }}">
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    body {
        font-family: 'Prompt', sans-serif;
        font-weight: 400;
    }
    p{
        font-weight: 200;
    }
    </style>


</head>
<body>
    <div id="mainapp">
            @yield('content')

    </div>
       <!-- Scripts -->
       <script src="{{ asset('assets/js/vendor.js') }}"></script>
       <script src="{{ asset('assets/js/template.js') }}"></script>
</body>
</html>
