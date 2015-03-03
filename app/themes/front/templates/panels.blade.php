@extends('theme::layout.master')

@section('template')

<!-- END -->

<section class="media-section darkbg" style="background:url(/front/images/content/parallax2.jpg);">
    <div class="inner">
        <div class="text-center">
            <h1 class="uppercase hr-mid">Panels</h1>
        </div>
    </div>
</section>

<div class="container"></div>

<section class="container section small">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <ul class="galleryFilters clearfix list-unstyled list-inline">
                    <li><a data-filter="*" class="btn btn-border active">All</a></li>
                    @foreach ($panelsCategories as $cat)
                        <li><a data-filter=".{{ studly_case($cat->name) }}" class="btn btn-border">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
                <div class="clearfix"></div>
            </div>
            <div id="galleryContainer" class="galleryContainer clearfix col-4 withSpaces magnific-gallery">
                @foreach ($panels as $panel)
                <div class="galleryItem {{ studly_case($panel->name) }}">
                    <a class="thumb-title" data-toggle="modal" data-target="#{{ studly_case($panel->title) }}" style="cursor:pointer;"><div class="project-thumb">
                        @if ($panel->photo) {{ Imagecache::get('panels/'.$panel->photo, 'panel')->img }} @endif

                        <div class="thumb-info">

                                <h4>{{ $panel->title }}</h4>
                                <p style="font-size:11px;text-decoration:underline;margin:0;">Tell me more</p>

                        </div>
                    </div></a>
                </div>
                <!-- Modal -->
                <div class="modal fade popup" id="{{ studly_case($panel->title) }}" tabindex="-1" role="dialog" aria-labelledby="{{ studly_case($panel->title) }}Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="container">
                            <button type="button" class="close" data-dismiss="modal" style="font-size:52px;" aria-hidden="true">&times;</button>
                            <h2 style="text-transform:uppercase;">{{ $panel->title }}</h2>
                            <hr />
                            <div class="row">
                                <div class="col-lg-6">@if ($panel->photo && !empty($panel->photo)) {{ Imagecache::get('panels/'.$panel->photo, '601x414')->img }} @endif</div>
                                <div class="col-lg-6" style="max-height:400px; overflow:auto; text-align: justify;
    text-justify: inter-word;"><div style="font-size:18px;">{{ $panel->content }}</div></div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
            <!-- / galleryContainer -->
        </div>
    </div>
</section>

<div class="container"></div>
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