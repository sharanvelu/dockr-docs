<li class="dropdown">
    <a class="dropdown-toggle" href="#" onclick="event.preventDefault()">
        {{ ucwords(request()->route()->parameter('version')) }}
        <span class="mx-1">&bigtriangledown;</span>
    </a>
    <ul class="dropdown-menu">
        @foreach(getVersionList() as $version)
            <li>
                <a href="{{ getDocsRoute($version, request()->route('path')) }}"
                    @if($version == request()->route()->parameter('version'))
                        onclick="event.preventDefault()" class="dropdown-item text-info"
                   @else
                        class="dropdown-item"
                    @endif
                >{{ ucwords($version) }}</a>
            </li>
        @endforeach
    </ul>
</li>
