<label for="header_version_toggle"></label>
<select class="version" id="header_version_toggle" name="version_toggle">
    @foreach(configEnv('version.list') as $version)
        <option value="{{ $version }}"
                @if($version == request()->route()->parameter('version'))
                selected
                data-page="current"
                @endif
                data-url="{{ route('docs.show', ['version' => $version, 'path' => 'introduction']) }}"
        >{{ $version }}</option>
    @endforeach
</select>
