@extends('theme::layout.master')

@section('template')
<section class="call-box bg3" id="participants">
    <div class="inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="uppercase hr-mid text-center">
                        About us
                    </h1>
                </div>
            </div>

        </div>
    </div>
</section>
<br /><br />
<section id="participants">
    <div class="container">
        <div class="row without-padding">
            <div class="col-lg-8 col-md-6">
                <div id="keynoteSpeakers" class="carousel slide" data-ride="keynoteSpeakers">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->keynoteSpeakers as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '780x400')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <div class="height">
                            <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                            <p  style="text-align:left;" class="text-center"><br />{{ $media->pivot->content }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade popup" id="{{ studly_case($media->pivot->title) }}" tabindex="-1" role="dialog" aria-labelledby="{{ studly_case($media->pivot->title) }}Label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="container">
                                <button type="button" class="close" data-dismiss="modal" style="font-size:52px;" aria-hidden="true">&times;</button>
                                <h2 style="text-transform:uppercase;">{{ $media->pivot->title }}</h2>
                                <hr />
                                <div class="row">
                                    <div class="col-lg-6">{{ Imagecache::get('media/'.$media->realname, '601x414')->img }}</div>
                                    <div class="col-lg-6"><div style="font-size:18px;padding-left:40px;">{{ $media->pivot->content }}</div></div>
                                </div>
                            </div>
                          </div>
                        </div>
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
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x400')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <div class="height">
                            <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                            <p class="text-center" style="text-align:left;"><br />{{ $media->pivot->content }}</p>
                            </div>
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
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x280')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <div class="height">
                            <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                            <p class="text-center" style="text-align:left;"><br />{{ $media->pivot->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                    @if (count($category->galleries->radaPrawna) > 1)
                    <a class="left carousel-control" href="#radaEkonomiczna" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#radaEkonomiczna" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div id="radaPolityczna" class="carousel slide" data-ride="radaPolityczna">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->radaPolityczna as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x280')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <div class="height">
                            <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                            <p class="text-center" style="text-align:left;"><br />{{ $media->pivot->content }}</p>
                            </div>
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
            <div class="col-lg-4 col-md-6">
                <div id="galleryTwo" class="carousel slide" data-ride="galleryTwo">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->galleryTwo as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                      <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x560')->img }}</a>
                      <div class="carousel-caption slaid-title">
                          <div class="height">
                          <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                          <p class="text-center" style="text-align:left;"><br />{{ $media->pivot->content }}</p>
                          </div>
                      </div>
                    </div>
                @endforeach
                </div>
                    @if (count($category->galleries->galleryTwo) > 1)
                    <a class="left carousel-control" href="#galleryTwo" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#galleryTwo" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row without-padding">
            <div class="col-lg-4 col-md-6 col-lg-marginm280">
                <div id="galleryTwo" class="carousel slide" data-ride="galleryTwo">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->lawFirms as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                      <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x560')->img }}</a>
                      <div class="carousel-caption slaid-title">
                          <div class="height">
                          <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                          <p class="text-center" style="text-align:left;"><br />{{ $media->pivot->content }}</p>
                          </div>
                      </div>
                    </div>
                @endforeach
                </div>
                    @if (count($category->galleries->lawFirms) > 1)
                    <a class="left carousel-control" href="#galleryTwo" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#galleryTwo" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-lg-marginm280">
                <div id="radaEkonomiczna" class="carousel slide" data-ride="radaEkonomiczna">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->galleryTwo as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                      <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x280')->img }}</a>
                      <div class="carousel-caption slaid-title">
                          <div class="height">
                          <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                          <p class="text-center" style="text-align:left;"><br />{{ $media->pivot->content }}</p>
                          </div>
                      </div>
                    </div>
                @endforeach
                </div>
                    @if (count($category->galleries->galleryTwo) > 1)
                    <a class="left carousel-control" href="#radaEkonomiczna" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#radaEkonomiczna" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row without-padding">
            <div class="col-lg-4 col-md-6"></div>
            <div class="col-lg-8 col-md-6 col-lg-marginm280">
                <div id="patronaci" class="carousel slide" data-ride="patronaci">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->patronaci as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                      <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '780x280')->img }}</a>
                      <div class="carousel-caption slaid-title">
                          <div class="height">
                          <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                          <p class="text-center" style="text-align:left;"><br />{{ $media->pivot->content }}</p>
                          </div>
                      </div>
                    </div>
                @endforeach
                </div>
                    @if (count($category->galleries->patronaci) > 1)
                    <a class="left carousel-control" href="#patronaci" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#patronaci" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row without-padding">
            <div class="col-lg-8 col-md-6" style="margin-top: -1px;">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->sponsors as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '780x400')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <div class="height">
                            <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                            <p class="text-center" style="text-align:left;"><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis, odio ut luctus tincidunt,
                            sem massa efficitur eros, vel tincidunt odio magna ac ante.
                            Praesent laoreet efficitur elit, tincidunt commodo nisl malesuada et. Suspendisse sagittis non ipsum vitae ultricies. </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                 @if (count($category->galleries->sponsors) > 1)
                    <a class="left carousel-control" href="#radaPrawna" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#radaPrawna" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6" style="margin-top: -1px;">
                <div id="radaPrawna" class="carousel slide" data-ride="radaPrawna">
                <div class="carousel-inner" role="listbox">
                @foreach ($category->galleries->media as $k => $media)
                    <div class="item @if ($k == 0) active @endif">
                        <a href="{{ $media->pivot->link }}">{{ Imagecache::get('media/'.$media->realname, '390x400')->img }}</a>
                        <div class="carousel-caption slaid-title">
                            <div class="height">
                            <h3 style="text-align:left;">{{ $media->pivot->title }}</h3>
                            <p class="text-center" style="text-align:left;"><br />{{ $media->pivot->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                    @if (count($category->galleries->media) > 1)
                    <a class="left carousel-control" href="#radaPrawna" role="button" data-slide="prev">&nbsp;</a>
                    <a class="right carousel-control" href="#radaPrawna" role="button" data-slide="next">&nbsp;</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<br /><br />
  @include('theme::includes.mainfooter')
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