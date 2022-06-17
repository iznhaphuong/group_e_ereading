<?php
use Illuminate\Html\HtmlFacade;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link name="bootstrap" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link name="font-awesome" rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/all.min.css') }}">
    <link name="style-14" rel="stylesheet" href="{{ asset('css/style-14.css') }}">
    <link name="style-15" rel="stylesheet" href="{{ asset('css/style-15.css') }}">
    @stack('head-css')
</head>

<body>
    <main>
        <div class="row">
            <div class="col-2 p-0">
                @include('admin.layout.partials.15-content')
            </div>
            <div class="col-10 p-0">
                @include('admin.layout.partials.14-content')
                @yield('main')
            </div>
        </div>
   </main>

    <footer>
        {{-- @include() --}}
    </footer>
    {{-- script --}}
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    @stack('footer-js')
</body>

</html>
