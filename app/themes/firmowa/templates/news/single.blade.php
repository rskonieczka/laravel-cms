@extends('theme::layout.master')

@section('template')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            {{ $category->breadcrumbs }}
        </div>
    </div>
    <section class="section-content">
        <div class="container-fluid">
            <article class="news">
                <h4 class="visible-xs visible-sm">{{ $post->title }}</h4>
                <div class="row">
                    <div class="col-md-4">
                        <figure class="text-center">
                            {{ renderImage('posts/', $post->photo, 'post', array('class' => 'img-responsive')) }}
                        </figure>
                    </div>
                    <div class="col-md-8">
                        <h4 class="hidden-xs hidden-sm">{{ $post->title }}</h4>
                        <div class="wysiwyg-text">
                            {{ $post->content }}
                        </div>
                        @if(!empty($post->tags))
                            <div class="article-tags">
                            {{ $post->tags }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @if(!empty($post->badges))
                        <div class="row params-badge">
                            {{ $post->badges }}
                        </div>
                        @endif
                        @if(!empty($post->parameters))
                        <div class="table-responsive hidden-xs hidden-sm">
                            {{ $post->parameters }}
                        </div>
                        @endif
                    </div>
                </div>
            </article>
        </div>
    </section>
    <div class="events events-popular">
        <div class="container-fluid">
            <h2>{{ trans('interface.newssingle_others') }}</h2>
            <div id="eventsMCustomScrollbar" class="content horizontal-images snap-scrolling-example">
                <ul class="list-unstyled">
                    @foreach($posts as $post)
                    <li class="events__item">
                        <a href="{{ URL::to(trans('routes.newssingle').$post->id.'/'.Slugify::slugify($post->title)) }}">
                            {{ renderImage('posts/', $post->photo, 'post') }}
                        </a>
                        <div class="events__item__inner">
                            <h6><a href="{{ URL::to(trans('routes.newssingle').$post->id.'/'.Slugify::slugify($post->title)) }}">{{ $post->title }}</a></h6>
                            <div class="wysiwyg-text">{{ str_limit($post->content, $limit = 170, $end = '...') }}</div>
                            <p class="more">
                                <a href="{{ URL::to(trans('routes.newssingle').$post->id.'/'.Slugify::slugify($post->title)) }}" class="btn btn-default">{{ trans('interface.newssingle_readmore') }}</a>
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @include('theme::templates.sections.common.rewards')
@stop