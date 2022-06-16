<?php 
use Illuminate\Html\HtmlFacade;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Ereading')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nhóm E">
    <link name="bootstrap" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link name="font-awesome" rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/all.min.css')}}">
    <link name="style-common" rel="stylesheet" href="{{ asset('css/style-common.css') }}" >
    <link name="style-01" rel="stylesheet" href="{{ asset('css/style-01.css') }}">
    <link name="style-02" rel="stylesheet" href="{{ asset('css/style-02.css') }}">
    <link name="style-08" rel="stylesheet" href="{{ asset('css/style-08.css') }}">
    @yield('css')
    @stack('head-css')
</head>

<body>
    <header>
        {{-- logo --}}
        @include('user.layout.partials.01-content')
        {{-- navbar --}}
        @include('user.layout.partials.02-content')
    </header>

    <main> 
        @yield('main')
    </main>

    
    <footer>
    @include('user.layout.partials.08-content')
    </footer>
    {{-- script --}}
    @yield('js')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('footer-js')
</body>

</html>


