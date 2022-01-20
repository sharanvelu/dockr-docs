<div class="row mr-3 ml-0">
    <label for="header_version_toggle"></label>
    <select class="version" id="header_version_toggle" name="version_toggle">
        @foreach(getVersionList() as $version)
            <option value="{{ $version }}"
                    @if($version == request()->route()->parameter('version'))
                    selected
                    data-page="current"
                    @endif
                    data-url="{{ getDocsRoute($version, request()->route('path')) }}"
            >{{ $version }}</option>
        @endforeach
    </select>
</div>
