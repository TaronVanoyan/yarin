<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('app.name', 'Laravel') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('base/images/favicon.ico') }}" />

    <link href="{{ asset('base/css/entypo.css') }}" rel="stylesheet">
    <link href="{{ asset('base/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('base/css/plugins/css3-animate-it-plugin/animations.css') }}" rel="stylesheet">
    <link href="{{ asset('base/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('base/css/mouldifi-core.css') }}" rel="stylesheet">
    <link href="{{ asset('base/css/mouldifi-forms.css')}}" rel="stylesheet">
    <link href="{{ asset('base/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <link href="{{ asset('base/css/mouldifi-rtl-core.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
</head>
<body class="login-page">
<div class="login-pag-inner">
    @yield('content')
</div>

<script src="{{ asset('base/js/jquery.min.js') }}"></script>
<script src="{{ asset('base/js/plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('base/js/plugins/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('base/js/plugins/jquery-validation/dist/localization/messages_he.min.js') }}"></script>
<script src="{{ asset('base/js/plugins/css3-animate-it-plugin/css3-animate-it.js') }}"></script>
<script src="{{ asset('base/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/i18n/he.js') }}"></script>
<script src="{{ asset('js/validator.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>