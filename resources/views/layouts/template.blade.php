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
        
        <nav class="navbar navbar-expand-lg fixed-top p-2">
            <a class="navbar-brand ml-5" href="{{ route('main-index') }}">Deina.</a>

            <div class="ml-auto mr-5 main-menu">
                <a href="{{ route('main-index') }}">Home</a>
                <a href="{{ route('project-index') }}">Work</a>
                <a href="{{ route('about-index') }}">About</a>
                <a href="{{ route('contact-index') }}">Contact</a>
            </div>
        </nav>
        
        @yield('content')

        <footer class="d-flex align-items-center flex-column pt-5">
            <a class="mini-logo" href="{{ route('main-index') }}">Deina.</a>
            <div class="footer-menu">
                <a href="{{ route('main-index') }}">Home</a>
                <a href="{{ route('project-index') }}">Work</a>
                <a href="{{ route('about-index') }}">About</a>
                <a href="{{ route('contact-index') }}">Contact</a>
            </div>
            <div>
                <p>All Copyrights Reserved</p>
            </div>
        </footer>
    </body>
</html>