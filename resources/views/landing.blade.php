<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DockR</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,700|IBM+Plex+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/landing/style.css') }}">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>

<body class="is-boxed has-animations">
<div class="body-wrap boxed-container">
    <header class="site-header">
        <div class="container">
            <div class="site-header-inner">
                <div class="brand header-brand">
                    <h1 class="m-0">
                        <a href="{{ route('home') }}">
                            <img class="header-logo-image asset-light" src="{{ $appLogo }}" alt="Logo">
                            <img class="header-logo-image asset-dark" src="{{ $appLogo }}" alt="Logo">
                        </a>
                    </h1>
                </div>
                <div class="lights-toggle">
                    <input id="lights-toggle" type="checkbox" name="lights-toggle" class="switch" checked="checked">
                    <label for="lights-toggle" class="text-xs"></label>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-inner">
                    <div class="hero-copy">
                        <h1 class="hero-title mt-0">DockR package for Laravel</h1>
                        <p class="hero-paragraph">Our package lets your Laravel projects run with Docker seamlessly for Local development environment.</p>
                        <div class="hero-cta">
                            <a class="button button-primary" href="{{ route('docs.latest', ['path' => 'introduction']) }}">Get it now</a>
                        </div>
                    </div>
                    <div class="hero-media">
                        <div class="header-illustration">
                            <img class="header-illustration-image asset-light" src="{{ asset('assets/landing/images/header-illustration-light.svg') }}" alt="Header illustration">
                            <img class="header-illustration-image asset-dark" src="{{ asset('assets/landing/images/header-illustration-dark.svg') }}" alt="Header illustration">
                        </div>
                        <div class="hero-media-illustration">
                            <img class="hero-media-illustration-image asset-light" src="{{ asset('assets/landing/images/hero-media-illustration-light.svg') }}" alt="Hero media illustration">
                            <img class="hero-media-illustration-image asset-dark" src="{{ asset('assets/landing/images/hero-media-illustration-dark.svg') }}" alt="Hero media illustration">
                        </div>
                        <div class="hero-media-container">
                            {{-- Terminal rows and columns used for this image : 120 x 34 --}}
                            <img class="hero-media-image asset-light" src="{{ asset('assets/landing/images/terminal-output/up-light.png') }}" alt="Hero media">
                            <img class="hero-media-image asset-dark" src="{{ asset('assets/landing/images/terminal-output/up-dark.png') }}" alt="Hero media">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="features section">
            <div class="container">
                <div class="features-inner section-inner has-bottom-divider">
                    <div class="features-header text-center">
                        <div class="container-sm">
                            <h2 class="section-title mt-0">DockR Features</h2>
                            <p class="section-paragraph">Our DockR packs in a tons of features you could imagine in any other package you could ever use.<br>DockR will be the only package you will ever need for a Laravel development environment.</p>
{{--                            <p class="section-paragraph">DockR will be the only package you will ever need for a Laravel development environment.</p>--}}
                            <div class="features-image">
                                <img class="features-illustration asset-dark" src="{{ asset('assets/landing/images/features-illustration-dark.svg') }}" alt="Feature illustration">
                                <img class="features-box asset-dark" src="{{ asset('assets/landing/images/terminal-output/help-dark.png') }}" alt="Feature box">
                                <img class="features-illustration asset-dark" src="{{ asset('assets/landing/images/features-illustration-top-dark.svg') }}" alt="Feature illustration top">
                                <img class="features-illustration asset-light" src="{{ asset('assets/landing/images/features-illustration-light.svg') }}" alt="Feature illustration">
                                <img class="features-box asset-light" src="{{ asset('assets/landing/images/terminal-output/help-light.png') }}" alt="Feature box">
                                <img class="features-illustration asset-light" src="{{ asset('assets/landing/images/features-illustration-top-light.svg') }}" alt="Feature illustration top">
                            </div>
                        </div>
                    </div>
                    <div class=""></div>
                    <div class="features-wrap">
                        <div class="feature is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <img class="asset-light" src="{{ asset('assets/landing/images/feature-01-light.svg') }}" alt="Feature 01">
                                    <img class="asset-dark" src="{{ asset('assets/landing/images/feature-01-dark.svg') }}" alt="Feature 01">
                                </div>
                                <div class="feature-content">
                                    <h3 class="feature-title mt-0">PHP Versions</h3>
                                    <p class="text-sm mb-0">DockR supports almost every PHP Versions. Don't worry, other PHP versions weren't abandoned, they will be supported in the upcoming weeks.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <img class="asset-light" src="{{ asset('assets/landing/images/feature-03-light.svg') }}" alt="Feature 03">
                                    <img class="asset-dark" src="{{ asset('assets/landing/images/feature-03-dark.svg') }}" alt="Feature 03">
                                </div>
                                <div class="feature-content">
                                    <h3 class="feature-title mt-0">Proxy</h3>
                                    <p class="text-sm mb-0">DockR provides an option to proxy the incoming request via a Domain name of your choice instead of using <i>localhost:port</i></p>
                                </div>
                            </div>
                        </div>
                        <div class="feature is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <img class="asset-light" src="{{ asset('assets/landing/images/feature-01-light.svg') }}" alt="Feature 01">
                                    <img class="asset-dark" src="{{ asset('assets/landing/images/feature-01-dark.svg') }}" alt="Feature 01">
                                </div>
                                <div class="feature-content">
                                    <h3 class="feature-title mt-0">Asset Containers</h3>
                                    <p class="text-sm mb-0">DockR provides separate containers for assets such as MySQL, Postgres and Redis. Multiple projects can connect to the same Database if needed.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <img class="asset-light" src="{{ asset('assets/landing/images/feature-02-light.svg') }}" alt="Feature 02">
                                    <img class="asset-dark" src="{{ asset('assets/landing/images/feature-02-dark.svg') }}" alt="Feature 02">
                                </div>
                                <div class="feature-content">
                                    <h3 class="feature-title mt-0">Customization</h3>
                                    <p class="text-sm mb-0">Our Docker Image contains most of the packages and extensions built-in. If you are not satisfied with them, you can create your own image and use it with your project.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <img class="asset-light" src="{{ asset('assets/landing/images/feature-02-light.svg') }}" alt="Feature 02">
                                    <img class="asset-dark" src="{{ asset('assets/landing/images/feature-02-dark.svg') }}" alt="Feature 02">
                                </div>
                                <div class="feature-content">
                                    <h3 class="feature-title mt-0">Worker</h3>
                                    <p class="text-sm mb-0">DockR provides an easy way to work with Schedules and Queues. DockR will create a separate container and runs a Scheduler and two Queue Listeners for working with Worker tasks.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <img class="asset-light" src="{{ asset('assets/landing/images/feature-03-light.svg') }}" alt="Feature 03">
                                    <img class="asset-dark" src="{{ asset('assets/landing/images/feature-03-dark.svg') }}" alt="Feature 03">
                                </div>
                                <div class="feature-content">
                                    <h3 class="feature-title mt-0">Composer</h3>
                                    <p class="text-sm mb-0">DockR provides an option to have use specific Composer version for different projects.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature is-revealing">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <img class="asset-light" src="{{ asset('assets/landing/images/feature-03-light.svg') }}" alt="Feature 03">
                                    <img class="asset-dark" src="{{ asset('assets/landing/images/feature-03-dark.svg') }}" alt="Feature 03">
                                </div>
                                <div class="feature-content">
                                    <h3 class="feature-title mt-0">Convenience</h3>
                                    <p class="text-sm mb-0">All these above-mentioned features are available and accessed by just setting up an environment variable within the '.env' file.</p>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div style="padding-top: 88px; font-size:16px">--}}
{{--                        <div class="alert alert-info">--}}
{{--                            <div class="row">--}}
{{--                                <div class="text-danger">Note : &nbsp;</div>--}}
{{--                                <div>--}}
{{--                                    More features such as <code class="text-danger">DB Import</code>, <code class="text-danger">Asset Config</code>, <code class="text-danger">Site Proxy</code> and more were already build and is in testing phase.--}}
{{--                                    <br>We will release the next version once the issues fixed and documentation works are completed.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>

        <section class="cta section">
            <div class="container-sm">
                <div class="cta-inner section-inner">
                    <div class="cta-header text-center">
                        <h2 class="section-title mt-0">Documentation</h2>

                        <p class="section-paragraph">
                            For more information on DockR.<br>Please visit the documentation<br>Documentation link below.
                        </p>
                        <div class="cta-cta">
                            <a class="button button-primary" href="{{ route('docs.latest') }}">Documentation</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer has-top-divider">
        <div class="container">
            <div class="site-footer-inner">
                <div class="brand footer-brand">
                    <a href="#">
                        <img class="asset-light footer-logo" src="{{ $appLogo }}" alt="Logo">
                        <img class="asset-dark footer-logo" src="{{ $appLogo }}" alt="Logo">
                    </a>
                </div>
                <ul class="footer-links list-reset" style="visibility: hidden">
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">About us</a>
                    </li>
                    <li>
                        <a href="#">FAQ's</a>
                    </li>
                    <li>
                        <a href="#">Support</a>
                    </li>
                </ul>
                <ul class="footer-social-links list-reset">
                    <li>
                        <a href="#">
                            <span class="screen-reader-text">Facebook</span>
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z" fill="#FFF"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="screen-reader-text">Twitter</span>
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z" fill="#FFF"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="screen-reader-text">Google</span>
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#FFF"/>
                            </svg>
                        </a>
                    </li>
                </ul>
{{--                <div class="footer-copyright">&copy; 2018 Switch, all rights reserved</div>--}}
            </div>
        </div>
    </footer>
</div>

<script src="{{ asset('assets/landing/main.min.js') }}"></script>
</body>
</html>
