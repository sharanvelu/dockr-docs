<header id="header" class="sticky-top">
    <!-- Navbar -->
    <nav class="primary-menu navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- Sidebar Toggler -->
            <button id="sidebarCollapse" class="navbar-toggler d-block d-md-none" type="button">
                <span></span>
                <span class="w-75"></span>
                <span class="w-50"></span>
            </button>

            <!-- Logo -->
            <a class="logo ml-md-3" href="{{ route('home') }}" title="{{ $appName }}">
                <img alt="{{ $appName }}"
                     src="{{ $appLogo }}"
                     width="150rem"/>
            </a>

{{--            <div class="row mr-3 ml-0">--}}
{{--                 Todo : Add blog Site Link --}}
{{--                <x-header.version_dropdown></x-header.version_dropdown>--}}
{{--            </div>--}}

            <div id="header-nav" class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    @if(configEnv('pages.blog.enabled'))
                        <li>
                            <a href="{{ configEnv('pages.blog.link') }}">Blog</a>
                        </li>
                    @endif
                    <x-header.version_dropdown></x-header.version_dropdown>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
</header>
