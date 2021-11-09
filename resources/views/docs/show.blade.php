@extends('docs.layout')

@section('content')
    <div class="idocs-content">
        <div class="container" id="markdown_content">
            {!! $content !!}
        </div>
    </div>
@endsection
