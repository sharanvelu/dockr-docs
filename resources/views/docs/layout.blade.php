<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="{{ asset('template/images/favicon.png') }}" rel="icon"/>
    <title>Documentation | Your ThemeForest item Name</title>
    <meta name="description" content="Your ThemeForest item Name and description">
    <meta name="author" content="harnishdesign.net">

    <!-- Stylesheet -->
    <!-- ============================== -->
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
    <link rel="stylesheet" href="{{ asset('template/css/color-cyan.css') }}"/>
</head>

<body class="box" data-spy="scroll" data-target=".idocs-navigation" data-offset="125">

<!-- Preloader -->
<div class="preloader">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- Preloader End -->

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

    <!-- Footer -->
    @include('docs.footer')

</div>
<!-- Document Wrapper end -->

<!-- Back To Top -->
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript
============================ -->
<script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Highlight JS -->
<script src="{{ asset('template/vendor/highlight.js/highlight.min.js') }}"></script>
<!-- Easing -->
<script src="{{ asset('template/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('template/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<!-- Custom Script -->
<script src="{{ asset('template/js/theme.js') }}"></script>
</body>
</html>
