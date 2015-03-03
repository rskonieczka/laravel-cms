@extends('theme::layout.master')

@section('template')
{{--
<pre>
{{ print_r($category) }}
</pre>
--}}
<div class="rev-slider-container">
    <div id="rev1" class="rev-slider">
        <ul>
            <!-- SLIDE  -->
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1">
                <!-- MAIN IMAGE -->
                {{ HTML::image('front/images/content/main-slide2.jpg', 'kenburns1',
                    array(
                        'data-bgposition' => 'center center',
                        'data-bgfit' => 'fade',
                        'data-bgpositionend' => 'center center',
                        )
                    )
                    }}

                <div class="tp-caption customin customout h1 uppercase white medium"
                     data-x="center"
                     data-y="145"

                     data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                     data-speed="1000"
                     data-start="800"
                     data-easing="Back.easeInOut"
                     data-endspeed="300"
                     style="z-index: 7; text-align: center;">
                    <h2 style="margin-bottom: 0;">Are you ready for</h2>the biggest legal project ?
                    <hr>
                </div>

                <div class="tp-caption sfb"
                     data-x="center"
                     data-y="355"

                     data-speed="500"
                     data-start="1500"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 7; font-size:36px;">
                    <a href="/concept" class="btn btn-border btn-lg">Tell me more</a>
                </div>
            </li>
        </ul>
        <div class="tp-bannertimer"></div>
    </div>
</div>

<!-- END REVOLUTION SLIDER -->
<div class="container"></div>

<section class="call-box bg3">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="table-cell col-md-7">
                    <h2 class="uppercase">
                        Join the project!
                    </h2>
                </div>
                <div class="table-cell col-md-5 text-right">
                    <a href="#" class="btn-purchase btn btn-primary btn-lg large-padding">Get access</a>
                    <a href="/concept" class="btn btn-border btn-lg large-padding">Tell me more</a>
                </div>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="pre-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h2 class="uppercase">Latest <span class="weight400">news</span></h2>
                    <div class="flexslider" data-smoothheight="true" data-animationloop="false" data-directionnav="true" data-slideshow="false">
                        <ul class="slides">
                            @foreach ($category->posts as $index => $post)
                            @if ($index==0 || $index%2 == 0)
                            <li><div class="row">
                            @endif
                                <div class="col-md-6">
                                    <article>
                                        <div class="date">
                                            <span class="day">{{ date("d",strtotime($post->created_at)) }}</span>
                                            <span class="month">{{ date("M",strtotime($post->created_at)) }}</span>
                                        </div>
                                        <h4 class="uppercase">{{ link_to("post/$post->id/".Str::slug($post->title), $post->title, $attributes = array(), $secure = null) }}</h4>
                                        <p>
                                            {{ str_limit($post->content, $limit = 120, $end = '...') }}
                                            <br>
                                            {{ link_to("post/$post->id/".Str::slug($post->title), 'Read more', $attributes = array(), $secure = null) }}
                                        </p>
                                    </article>
                                </div>
                            @if ($index%2 != 0 || $index+1 == count($category->posts))
                            </div></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <br /><br /><br />
                    <article class="bg4" style="padding:20px 20px 60px;">
	                <h4 class="uppercase">Sign Up for Newsletter</h4>
	                <div class="successMessage alert alert-success" style="display: none">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                    Thank You!
	                </div>
	                <div class="errorMessage alert alert-danger" style="display: none">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                    Ups! An error occured. Please try again later.
	                </div>

	                <form class="form-inline validateIt form-group-float-label" role="form" action="assets/form/send.php" method="post" data-email-subject="Newsletter Form" data-show-errors="true" data-hide-form="true">
	                    <input type="email" id="newsletter" class="form-control input-lg" name="field[]" required="" placeholder="Email address">
	                    <label for="newsletter">Email address</label>
	                    <button class="button-arrow" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Don't worry, we do not spam!"><i class="fa fa-fw fa-angle-double-right"></i> </button>
	                </form>
	                </article>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="media-section darkbg" style="background:#20221f;">
    <div class="inner" style=" padding:30px 0;">
        <div class="text-center">
            <h1 class="uppercase hr-mid"><span class="weight400">Law for</span> freedom and growth</h1>
        </div>
    </div>
</section>
<section class="container section-top">
    <div class="row">
        <div class="col-md-12">
            <div class="ct-process">
                <div class="row">
                    <div class="display-table">
                        <div class="hidden-sm table-cell ct-process-icon">
                            <span class="ct-process-right"><i class="fa fa-sort-asc" style="font-size: 40px;
top: 9px;
position: relative;"></i></span>
                        </div>
                        <div class="table-cell text-center animated" data-fx="bounceIn" data-time="50">
                            <a href="/concept#congress" class="hover-desc">
                            {{ HTML::image('front/images/content/research.jpg', 'Research', array('class' => 'img-circle img-responsive')) }}
                            <div class="desc"><br /><br /><br /><div id="countdown"></div><span style="font-size:15px;text-decoration:underline;">Tell me more</span></div></a>

                            <div class="shadow"></div>
                            <span class=" motive bold">Research</span>
                        </div>
                        <div class="table-cell text-center animated" data-fx="bounceIn" data-time="150">
                            <a href="/concept#congress" class="hover-desc">
                            {{ HTML::image('front/images/content/idea.jpg', 'Research', array('class' => 'img-circle img-responsive')) }}
                            <div class="desc"><br /><br /><br />3-day conference<br /> dedicated to the presentation <br />of the research results.
                                             <br /><br /><span style="font-size:15px;text-decoration:underline;">Tell me more</span></div></a>

                            <div class="shadow"></div>
                            <span class=" motive bold">Congress</span>
                        </div>
                        <div class="table-cell text-center animated" data-fx="bounceIn" data-time="250">
                            <a href="/concept#report" class="hover-desc">
                            {{ HTML::image('front/images/content/solution.jpg', 'Solution', array('class' => 'img-circle img-responsive')) }}<div class="desc"><br /><br /><br />Publication containing<br /> a summary of the research <br />and the congress, as well <br />as drafts of legislative acts.
                                             <br /><br /><span style="font-size:15px;text-decoration:underline;">Tell me more</span></div></a>

                            <div class="shadow"></div>
                            <span class=" motive bold">Report</span>
                        </div>
                        <div class="hidden-sm table-cell ct-process-icon">
                            <span class="ct-process-left" style="float: right;"><i class="fa fa-check"></i></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<br /><br /><br />
<div class="media-section darkbg" style="background:url('/front/images/content/parallax2.jpg');">
    <div class="inner"  style="padding: 20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="icon-counter animated" data-fx="pulse">
                        <div class="square-icon-box">
                            <i class="fa fa-globe"></i>
                        </div>
                    <span class="counter hr-mid" data-to="21">
                        0
                    </span>
                    <h2>Countries</h2>
                    </span>
                    </div>
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-md-3 col-sm-6">
                    <div class="icon-counter animated" data-fx="pulse">
                        <div class="square-icon-box">
                            <i class="fa fa-sitemap"></i>
                        </div>
                    <span class="counter hr-mid" data-to="21">
                        0
                    </span>
                        <h2>Panels</h2>
                    </div>
                </div>
                <div class="clearfix visible-sm visible-xs"></div>
                <div class="col-md-3 col-sm-6">
                    <div class="icon-counter animated" data-fx="pulse">
                        <div class="square-icon-box">
                            <i class="fa fa-calendar"></i>
                        </div>
                    <span class="counter hr-mid" data-to="300">
                        0
                    </span>
                        <h2>Days</h2>
                    </div>
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-md-3 col-sm-6">
                    <div class="icon-counter animated" data-fx="pulse">
                        <div class="square-icon-box">
                            <i class="fa fa-question-circle"></i>
                        </div>
                    <span class="counter hr-mid" data-to="2000">
                        0
                    </span>
                        <h2>Questions</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="hr-shadow" style="margin-top:0;">

<section id="participants">
    <div class="container">
        <div class="row without-padding">
            <div class="col-lg-4 col-md-6">
                <div id="radaBiznesowa" class="carousel slide" data-ride="radaBiznesowa">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->radaBiznesowa as $k => $media)
                    <div class="item @if ($k == 0) active @endif ">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x200')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <a href="{{ $media->pivot->link }}"><div class="height">
                            <h3>{{ $media->pivot->title }}</h3>
                            <p class="text-center"><br />{{ $media->pivot->content }}</p>
                            </div></a>
                        </div>
                    </div>
                @endforeach
                </div>
                     @if (count($category->galleries->radaBiznesowa) > 1)
                    <a class="left carousel-control" href="#radaBiznesowa" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#radaBiznesowa" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div id="keynoteSpeakers" class="carousel slide" data-ride="keynoteSpeakers">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->keynoteSpeakers as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x200')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <a href="{{ $media->pivot->link }}"><div class="height">
                            <h3>{{ $media->pivot->title }}</h3>
                            <p class="text-center"><br />{{ $media->pivot->content }}</p>
                            </div></a>
                        </div>
                    </div>
                @endforeach
                </div>
                     @if (count($category->galleries->keynoteSpeakers) > 1)
                    <a class="left carousel-control" href="#keynoteSpeakers" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#keynoteSpeakers" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div id="radaPrawna" class="carousel slide" data-ride="radaPrawna">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->radaPrawna as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x200')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <a href="{{ $media->pivot->link }}"><div class="height">
                            <h3>{{ $media->pivot->title }}</h3>
                            <p class="text-center"><br />{{ $media->pivot->content }}</p>
                            </div></a>
                        </div>
                    </div>
                @endforeach
                </div>
                     @if (count($category->galleries->radaPrawna) > 1)
                    <a class="left carousel-control" href="#radaPrawna" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#radaPrawna" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row without-padding">
            <div class="col-lg-4 col-md-6">
                <div id="radaEkonomiczna" class="carousel slide" data-ride="radaEkonomiczna">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->radaEkonomiczna as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x200')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <a href="{{ $media->pivot->link }}"><div class="height">
                            <h3>{{ $media->pivot->title }}</h3>
                            <p class="text-center"><br />{{ $media->pivot->content }}</p>
                            </div></a>
                        </div>
                    </div>
                @endforeach
                </div>
                     @if (count($category->galleries->radaEkonomiczna) > 1)
                    <a class="left carousel-control" href="#radaEkonomiczna" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#radaEkonomiczna" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div id="host" class="carousel slide" data-ride="host">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->host as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x200')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <a href="{{ $media->pivot->link }}"><div class="height">
                            <h3>{{ $media->pivot->title }}</h3>
                            <p class="text-center"><br />{{ $media->pivot->content }}</p>
                            </div></a>
                        </div>
                    </div>
                @endforeach
                </div>
                     @if (count($category->galleries->host) > 1)
                    <a class="left carousel-control" href="#host" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#host" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div id="radaPolityczna" class="carousel slide" data-ride="radaPolityczna">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->radaPolityczna as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x200')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <a href="{{ $media->pivot->link }}"><div class="height">
                            <h3>{{ $media->pivot->title }}</h3>
                            <p class="text-center"><br />{{ $media->pivot->content }}</p>
                            </div></a>
                        </div>
                    </div>
                @endforeach
                </div>
                     @if (count($category->galleries->radaPolityczna) > 1)
                    <a class="left carousel-control" href="#radaPolityczna" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#radaPolityczna" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<br /><br /><br /><br />

<section class="container">
    <div class="row section-bottom small">
        <div class="col-md-12 text-center">
            <h2 class="uppercase section-title hr-mid">Partners</h2>
        </div>
        <div class="col-md-12">
            <div class="text-center">
                @foreach ($category->galleries->partnersTop as $k => $media)
                    <a href="{{ $media->pivot->link }}"><img src="/uploads/media/{{ $media->realname }}" /></a>
                @endforeach
                <hr />
            </div>
            <div class="partners flexslider" data-maxitems="6" data-minitems="1" data-itemwidth="138" data-itemmargin="20" data-move="4" data-directionnav="true">
                <ul class="slides">
                    @foreach ($category->galleries->partnersBottom as $k => $media)
                        <li><a href="{{ $media->pivot->link }}"><img src="/uploads/media/{{ $media->realname }}" /></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

@include('theme::includes.mainfooter')

<span id="backtoTop" style="bottom:55px;"><i class="fa fa-fw fa-angle-double-up"></i></span>
<div class="container"></div>

<div class="post-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                Copyright 2014 © Law4Growth sp. z o. o. All rights reserved.
            </div>
            <div class="col-sm-6 text-right">
                <ul class="list-inline">
                    <li><div class="text-wrapper"><a href="https://www.facebook.com/legalcongress" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook fa-fw"></i></a></div></li>
                    <li><div class="text-wrapper"><a href="https://twitter.com/legal_congress" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter fa-fw"></i></a></div></li>
                </ul>
            </div>
        </div>
    </div>

</div>
@stop