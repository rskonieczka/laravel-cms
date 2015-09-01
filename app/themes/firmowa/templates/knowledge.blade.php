@extends('theme::layout.master')

@section('template')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            {{ $category->breadcrumbs }}
        </div>
    </div>
    <section class="section-content">
        <div class="container-fluid">
            <div class="row knowledge-row">
                <div class="col-md-4 col-aside">
                    @include('theme::includes.leftsidebar')
                </div>
                <div class="col-md-8 col-content">
                    <article>
                        <h4>{{ $knowledge->title }}</h4>
                        <div class="wysiwyg-content">
                            {{ $knowledge->content }}
                        </div>
                        <div class="procon-boxes clearfix">
                            <div class="procon-boxes__box">
                                <h5>{{ trans('interface.knowledge_causes') }}</h5>
                                <div class="procon-boxes__box-inner">
                                    {{ $knowledge->causes }}
                                </div>
                            </div>
							<span class="separate-line"></span>
                            <div class="procon-boxes__box">
                                <h5>{{ trans('interface.knowledge_prevention') }}</h5>
                                <div class="procon-boxes__box-inner">
                                    {{ $knowledge->prevention }}
                                </div>
                            </div>
                        </div>
                        <div class="box-small">
                            <h5>{{ trans('interface.knowledge_repair') }}</h5>
                            <div class="box-small__text">
                                {{ $knowledge->repair }}
                            </div>
                        </div>
                        @if(!empty($knowledge->movie))
                            <h4>Film instruktażowy</h4>
                            <!-- 4:3 aspect ratio -->
                            <div class="embed-responsive embed-responsive-4by3">
                                {{ $knowledge->movie }}
                            </div>
                        @endif
                        @if(!empty($knowledge->media))
                            <h4>Do pobrania</h4>
                            <ul class="download-list list-unstyled">
                                @foreach($knowledge->media as $file)
                                    <li><a href="{{ URL::to('uploads/media/'.$file->realname) }}" class="icon-download">{{ $file->pivot->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </article>
                </div>
            </div>
        </div>
    </section>
    @include('theme::templates.sections.common.rewards')
@stop