@extends('theme::layout.master')

@section('template')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            {{ $category->breadcrumbs }}
        </div>
    </div>
    <section class="section-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-aside hidden-xs hidden-sm">
                    @include('theme::includes.leftsidebar')
                </div>
                <div class="col-md-8 col-content">
                    <article>
                        @if($category->texts)
                            @foreach ($category->texts as $k => $text)
                                    <h4>{{ $text->title }}</h4>
                                    {{ $text->content }}
                            @endforeach
                        @endif
                    </article>
                </div>
            </div>
        </div>
    </section>
    @include('theme::templates.sections.common.rewards')
@stop