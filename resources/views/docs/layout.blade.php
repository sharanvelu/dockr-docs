<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="{{ $appIcon  }}" rel="icon"/>
    <title>{{ $appName }}</title>
    <meta name="author" content="sharanvelu">
    <meta name="description" content="Documentation For Dockr">

    <!-- Credit -->
    <meta name="credit" content="harnishdesign.net">
    <meta name="credit_for" content="This Documentation Template">

    <!-- Stylesheet -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}"/>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('template/vendor/font-awesome/css/all.min.css') }}"/>
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('template/vendor/magnific-popup/magnific-popup.min.css') }}"/>
    <!-- Highlight Syntax -->
    <link rel="stylesheet" href="{{ asset('template/vendor/highlight.js/styles/vs.css') }}"/>
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('template/css/stylesheet.css') }}"/>
    <!-- Accent Color -->
    <link rel="stylesheet" href="{{ asset('template/css/color-cyan.css') }}"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/custom.css') }}"/>
</head>

<body class="box" data-offset="125">

<x-preloader></x-preloader>

<!-- Document Wrapper -->
<div id="main-wrapper">

    <!-- Header -->
@include('docs.header')

    <!-- Content -->
    <div id="content" role="main">

        <!-- Sidebar Navigation -->
        @include('docs.sidebar')

        <!-- Docs Content -->
        @yield('content')

    </div>
    <!-- Content end -->

</div>
<!-- Document Wrapper end -->

<x-back_to_top></x-back_to_top>

<!-- JavaScript -->
<script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Highlight JS -->
<script src="{{ asset('template/vendor/highlight.js/highlight.min.js') }}"></script>
<!-- Easing -->
<script src="{{ asset('template/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('template/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<!-- Template Custom Script -->
<script src="{{ asset('template/js/theme.js') }}"></script>
<!-- Custom Scripts -->
<script src="{{ asset('assets/custom.js') }}"></script>
</body>
</html>
