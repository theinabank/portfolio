<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Deina Banka | Portfolio</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" type="module" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <body id="body">
        
        @yield('content')


    </body>
</html>