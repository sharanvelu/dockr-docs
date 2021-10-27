<header id="header" class="sticky-top">
    <!-- Navbar -->
    <nav class="primary-menu navbar navbar-expand-lg navbar-dropdown-dark">
        <div class="container-fluid">
            <!-- Sidebar Toggler -->
            <button id="sidebarCollapse" class="navbar-toggler d-block d-md-none" type="button"><span></span><span
                    class="w-75"></span><span></span></button>

            <!-- Logo -->
            <a class="logo ml-md-3" href="{{ route('home') }}" title="{{ config('app.name') }}">
                <img src="{{ $appLogo }}"
                     alt="{{ config('app.name') }}"
                     width="150rem"
                />
            </a>

            <x-header.version_dropdown></x-header.version_dropdown>
        </div>
    </nav>
    <!-- Navbar End -->
</header>
