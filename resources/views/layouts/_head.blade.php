<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="description" content="DoThings is a To-Do list manager (made with Laravel Framework) inspired by 'Getting Things Done' methodology.">
<meta name="keywords" content="do; to-do; things; done; list; manager; laravel; gtd;">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{-- ############################################################################################ --}}

<!-- Android  -->
<meta name="theme-color" content="green">
<meta name="mobile-web-app-capable" content="yes">

<!-- iOS -->
<meta name="apple-mobile-web-app-title" content="{{ config('app.name', 'Laravel') }}">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">

<!-- Windows  -->
<meta name="msapplication-navbutton-color" content="green">
<meta name="msapplication-TileColor" content="green">
<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
<meta name="msapplication-config" content="browserconfig.xml">

<!-- Pinned Sites  -->
<meta name="application-name" content="{{ config('app.name', 'Laravel') }}">
<meta name="msapplication-tooltip" content="{{ config('app.name', 'Laravel') }}">
<meta name="msapplication-starturl" content="/">

<!-- UC Mobile Browser  -->
<meta name="full-screen" content="yes">
<meta name="browsermode" content="application">

<!-- Orientation  -->
<meta name="screen-orientation" content="portrait">

{{-- Android icons --}}
<link href="{{ asset('images/android-chrome-192x192.png') }}" rel="icon" type="image/png" sizes="192x192">
<link href="{{ asset('images/android-chrome-512x512.png') }}" rel="icon" type="image/png" sizes="512x512">

<!-- iOS  -->
<link href="{{ asset('images/apple-touch-icon.png') }}" rel="apple-touch-icon">
<link href="{{ asset('images/apple-touch-icon-60x60.png') }}" rel="apple-touch-icon" sizes="60x60">
<link href="{{ asset('images/apple-touch-icon-76x76.png') }}" rel="apple-touch-icon" sizes="76x76">
<link href="{{ asset('images/apple-touch-icon-120x120.png') }}" rel="apple-touch-icon" sizes="120x120">
<link href="{{ asset('images/apple-touch-icon-152x152.png') }}" rel="apple-touch-icon" sizes="152x152">
<link href="{{ asset('images/apple-touch-icon-180x180.png') }}" rel="apple-touch-icon" sizes="180x180">

<!-- Main Link Tags  -->
<link href="{{ asset('images/favicon-16x16.png') }}" rel="icon" type="image/png" sizes="16x16">
<link href="{{ asset('images/favicon-32x32.png') }}" rel="icon" type="image/png" sizes="32x32">
{{-- <link href="{{ asset('images/favicon-48x48.png') }}" rel="icon" type="image/png" sizes="48x48"> --}}
<link href="{{ asset('images/favicon-194x194.png') }}" rel="icon" type="image/png" sizes="194x194">
{{-- <link href="{{ asset('images/favicon.ico') }}" rel="icon" type="image/ico"> --}}
<link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">

<!-- Manifest.json  -->
<link href="{{ asset('manifest.json') }}" rel="manifest">
