@extends('theme::layout.master')

@section('template')

<div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header visible-xs">
            <a class="navbar-brand" href="index.html"><img src="/front/images/content/logo.png" alt="Law 4 growth"/></a>
            <button type="button" class="navbar-toggle" id="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>

    <!-- END -->
    <section class="container section" style="padding-top:20px;">
        <div class="row">
            <div class="col-sm-8 col-md-8">
                <h2 class="hidden">Our Journal</h2>
                <div class="row">
                    <div class="col-sm-12 post">
                        <article class="journal">
                            <div class="media-object">
                                {{ Imagecache::get('posts/'.$post->photo, 'post')->img }}
                            </div>
                            <div class="clearfix"></div>
                            <h4 class="uppercase">{{ $post->title }}</h4>
                                {{ $post->content }}
                        </article>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 sidebar">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="uppercase">Recent News</h4>
                        <div class="widget">
                            <div class="widget-inner">
                                <ul>
                                     @foreach($posts as $item)
                                    <li>
                                        {{ link_to("post/$item->id/".Str::slug($item->title), $item->title, $attributes = array(), $secure = null) }}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <br />
                        <article class="bg4" style="padding:20px 10px 20px;">
                            <h4 class="uppercase" style="margin-top: 0;">Sign Up for Newsletter</h4>
                            <div class="successMessage alert alert-success" style="display: none">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Thank You!
                            </div>
                            <div class="errorMessage alert alert-danger" style="display: none">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Ups! An error occured. Please try again later.
                            </div>

                            <form class="form-inline validateIt form-group-float-label" role="form" action="assets/form/send.php" method="post" data-email-subject="Newsletter Form" data-show-errors="true" data-hide-form="true">
                                <input type="email" id="newsletter" class="form-control input-lg" name="field[]" required="" placeholder="Email Address">
                                <label for="newsletter">Email Address</label>
                                <button class="button-arrow" type="submit" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Don't worry, we do not spam!"><i class="fa fa-fw fa-angle-double-right"></i> </button>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <span id="backtoTop" style="bottom:55px;"><i class="fa fa-fw fa-angle-double-up"></i></span>
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