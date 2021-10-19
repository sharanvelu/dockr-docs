<header id="header" class="sticky-top">
    <!-- Navbar -->
    <nav class="primary-menu navbar navbar-expand-lg navbar-dropdown-dark">
        <div class="container-fluid">
            <!-- Sidebar Toggler -->
            <button id="sidebarCollapse" class="navbar-toggler d-block d-md-none" type="button"><span></span><span
                    class="w-75"></span><span></span></button>

            <!-- Logo -->
            <a class="logo ml-md-3" href="index.html" title="iDocs Template">
                <img src="{{ $appLogo }}"
                     alt="iDocs Template"
                     width="150rem"
                />
            </a>
            <span class="text-2 ml-2">{{ $version ?? 'v0.1' }}</span>
            <!-- Logo End -->

            <!-- Navbar Toggler -->
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#header-nav">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div id="header-nav" class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="dropdown"><a class="dropdown-toggle" href="#">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">Dropdown
                                    Action</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.html">Action</a></li>
                                    <li><a class="dropdown-item" href="feature-header-dark.html">Another Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="feature-header-primary.html">Something Else
                                            Here</a></li>
                                    <li><a class="dropdown-item" href="index-2.html">Another Link</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="#">Another Action</a>
                            <li><a class="dropdown-item" href="#">Something Else Here</a></li>
                        </ul>
                    </li>
                    <li><a target="_blank"
                           href="https://themeforest.net/user/harnishdesign/portfolio?ref=HarnishDesign">Other
                            Template</a></li>
                    <li><a target="_blank"
                           href="https://themeforest.net/user/harnishdesign/#contact?ref=HarnishDesign">Support</a>
                    </li>
                </ul>
            </div>
            <ul class="social-icons social-icons-sm ml-lg-2 mr-2">
                <li class="social-icons-twitter">
                    <a data-toggle="tooltip"
                       href="http://www.twitter.com/harnishdesign/" target="_blank"
                       title="" data-original-title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="social-icons-facebook">
                    <a data-toggle="tooltip"
                       href="http://www.facebook.com/harnishdesign/" target="_blank"
                       title="" data-original-title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="social-icons-dribbble">
                    <a data-toggle="tooltip"
                       href="http://www.dribbble.com/harnishdesign/" target="_blank"
                       title="" data-original-title="Dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar End -->
</header>
