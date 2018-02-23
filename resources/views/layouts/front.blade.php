<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yarin Events</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('events/css/index.css') }}?v=2.3">
    <link rel="stylesheet/less" type="text/css" href="./css/style.less" />
    <!-- Latest compiled and minified CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section("header_styles")
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css">

    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    @show
    @section("header_js")
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.2.0/jquery.fitvids.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>-->

    <script type="text/javascript" src="{{ asset('events/js/index.js') }}"></script>
    @show
</head>
<body>
<div id="main">
    @yield('header')
    @yield('box-head')
    @yield('event-section')
    @yield('head-team')
    @yield('teachers')
    @yield('vieo-head')
    @yield('video-content')
    @yield('footer')
    <input id="front_submit" type="hidden" value="{{route("front.submit")}}">
</div>
</body>
</html>
