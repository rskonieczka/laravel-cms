@extends('theme::layout.master')

@section('template')
@foreach ($category->texts as $k => $text)
<section class="content">
    <div class="inner">
        <div class="text-center">
            <h1>{{ $text->title }}</h1>
            {{ $text->content }}
        </div>
    </div>
</section>
@endforeach

@stop