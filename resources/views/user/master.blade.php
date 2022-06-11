<?php 
use Illuminate\Html\HtmlFacade;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link name="bootstrap" rel="stylesheet" href="css/bootstrap.min.css">
    <link name="fontawesome" rel="stylesheet" type="text/css" href="font-awesome/css/all.min.css">
    @yield('head-css')
</head>

<body>
    {{-- Header--}}
    {{-- @include('user.01-content') --}}
    {{-- Nav bar --}}
    @include('user.02-content')
    {{-- Content --}}
    {{-- Footer --}}
    {{-- @include() --}}
</body>

</html>





