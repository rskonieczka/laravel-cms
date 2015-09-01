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
                    <section class="container-wallpaper">
                        <article class="active">
                            <header>
                                <h2>{{ trans('interface.wallpapers_calendar') }} Novol 2015</h2>
                            </header>
                            <section>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(1).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(1).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(1).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(1).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(1).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(1).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(2).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(2).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(2).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(2).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(2).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(2).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(3).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(3).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(3).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(3).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(3).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(3).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(4).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(4).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(4).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(4).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(4).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(4).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(5).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(5).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(5).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(5).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(5).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(5).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(6).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(6).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(6).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(6).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(6).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(6).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(7).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(7).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(7).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(7).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(7).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(7).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(8).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(8).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(8).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(8).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(8).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(8).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(9).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(9).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(9).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(9).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(9).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(9).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(10).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(10).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(10).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(10).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(10).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(10).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(11).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(11).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(11).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(11).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(11).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(11).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(12).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(12).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(12).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(12).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(12).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(12).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(13).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1920x1080/w%20(13).jpg')}}">1920x1080</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1440x900/w%20(13).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1366x768/w%20(13).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1280x1024/w%20(13).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2015/1024x768/w%20(13).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                            </section>
                        </article>
                        <article>
                            <header>
                                <h2>{{ trans('interface.wallpapers_calendar') }}  Novol 2014</h2>
                            </header>
                            <section>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(1).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(1).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(1).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(1).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(1).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(2).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(2).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(2).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(2).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(2).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(3).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(3).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(3).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(3).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(3).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(4).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(4).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(4).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(4).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(4).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(5).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(5).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(5).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(5).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(5).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(6).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(6).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(6).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(6).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(6).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(7).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(7).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(7).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(7).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(7).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(8).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(8).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(8).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(8).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(8).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(9).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(9).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(9).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(9).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(9).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(10).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(10).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(10).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(10).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(10).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(11).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(11).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(11).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(11).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(11).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(12).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1440x900/w%20(12).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1366x768/w%20(12).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1280x1024/w%20(12).jpg')}}">1280x1024</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2014/1024x768/w%20(12).jpg')}}">1024x768</a></li>
                                    </ul>
                                </article>
                            </section>
                        </article>
                        <article>
                            <header>
                                <h2>{{ trans('interface.wallpapers_calendar') }}  Novol 2013</h2>
                            </header>
                            <section>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(1).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(1).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(1).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1280x1024/w%20(1).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(2).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(2).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(2).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1280x1024/w%20(2).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(3).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(3).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(3).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1280x1024/w%20(3).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(4).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(4).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(4).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1280x1024/w%20(4).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(5).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(5).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(5).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1280x1024/w%20(5).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(6).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(6).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(6).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1280x1024/w%20(6).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(7).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(7).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(7).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1280x1024/w%20(7).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(8).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(8).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(8).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1280x1024/w%20(8).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(9).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(9).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(9).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1280x1024/w%20(9).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(10).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(10).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(10).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(10).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(11).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(11).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(11).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(11).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                                <article>
                                    <figure><img src="{{URL::to('uploads/wallpapers/2013/1366x768/w%20(12).jpg')}}" alt=""></figure>
                                    <ul>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(12).jpg')}}">1440x900</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(12).jpg')}}">1366x768</a></li>
                                        <li><a target="_blank" href="{{URL::to('uploads/wallpapers/2013/1440x900/w%20(12).jpg')}}">1280x1024</a></li>
                                    </ul>
                                </article>
                            </section>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    @include('theme::templates.sections.common.rewards')
@stop

@section('extrascripts')
	{{ HTML::script('assets/firmowa/js/joseph.js') }}
@stop