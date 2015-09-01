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
                        <h4>{{ renderText($category->texts, 'companyMain', 'title') }}</h4>
                        <div class="wysiwyg-content">
                            {{ renderText($category->texts, 'companyMain', 'content') }}
                        </div>
                        <div class="box-small-group">
                            <h4 class="text-center">{{ trans('interface.company_success') }}</h4>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box-small">
                                        <h5>{{ trans('interface.company_success_1') }}</h5>

                                        <div class="box-small__text">
                                            <p>{{ trans('interface.company_success_1_1') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-small">
                                        <h5>{{ trans('interface.company_success_2') }}</h5>

                                        <div class="box-small__text">
                                            <p>{{ trans('interface.company_success_2_1') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-small">
                                        <h5>{{ trans('interface.company_success_3') }}</h5>

                                        <div class="box-small__text">
                                            <p>{{ trans('interface.company_success_3_1') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <div class="about-company" id="{{ trans('routes.home_movie_aboutcompany') }}">
        <h4 class="text-center visible-xs visible-sm">{{ trans('interface.company_intro') }}</h4>
        <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264"
               poster="{{ URL::to('assets/firmowa/img/video_cover.jpg') }}"
               data-setup="{}">
            <source src="{{ URL::to(trans('routes.company_video_mp4')) }}" type='video/mp4'/>
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser
                that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
        </video>
    </div>
    @include('theme::templates.sections.common.rewards')
@stop