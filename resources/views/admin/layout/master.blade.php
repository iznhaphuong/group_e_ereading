<?php 
use Illuminate\Html\HtmlFacade;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link name="bootstrap" rel="stylesheet" href="css/bootstrap.min.css">
    <link name="font-awesome" rel="stylesheet" type="text/css" href="font-awesome/css/all.min.css">
    <link rel="stylesheet" href="css/style-common.css">
    @stack('head-css')
</head>

<body>
    <header>
        {{-- navbar --}}
        {{-- @include('admin.layout.partials.-content') --}}
    </header>

    <main> 
        @yield('main')
    </main>

    
    <footer>
    {{-- @include() --}}
    </footer>
    {{-- script --}}
    <script src="js/bootstrap.bundle.min.js"></script>
    @stack('footer-js')
</body>

</html>





