@extends('theme::layout.master')

@section('template')

<section class="media-section darkbg" style="background:#20221f;" >
    <div class="inner" style=" padding:30px 0;">
        <div class="text-center">
            <h1 class="uppercase hr-mid">Concept</h1>
        </div>
    </div>
</section>
    <section class="section bg2" >
        <div class="container">
            <div class="row">
            <div class="col-md-12 text-center">
                <h4 class="uppercase hr-mid">
                    <a href="#research"><i class="fa fa-search" style="color:#de1f29;"></i> Research</a></h4>
                </h4>
            </div>
        </div>
            <div class="row visible-lg visible-md">
                <div class="col-md-4">
                    <ul class="media-list">
                        <li class="media feature-right-bottom animated" data-fx="fadeInLeft">
                            <div class="pull-right text-center">
                                <div class="square-icon-box square-icon-small">
                                    21
                                </div>
                            </div>
                            <div class="media-body text-right specjalistPanels">
                                <h4 class="media-heading uppercase">{{ $category->texts->specjalistPanels->title }}</h4>
                                <p>{{ $category->texts->specjalistPanels->content }}
                                </p>
                            </div>
                        </li>
                        <li class="media feature-right-bottom animated" data-fx="fadeInLeft">
                            <div class="pull-right text-center">
                                <div class="square-icon-box square-icon-small">
                                    <img src="/front/images/content/concept/3days.png" style="max-width: 60%;" />
                                </div>
                            </div>
                            <div class="media-body text-right treeDays">
                                <h4 class="media-heading uppercase">3 days</h4>
                                <p>Congress duration<br /><br /><br /><br /></p>
                            </div>
                        </li>
                        <li class="media feature-right-bottom animated" data-fx="fadeInLeft">
                            <div class="pull-right text-center">
                                <div class="square-icon-box square-icon-small">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                            <div class="media-body text-right participants">
                                <h4 class="media-heading uppercase">{{ $category->texts->participants->title }}</h4>
                                <p>{{ $category->texts->participants->content }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 text-center visible-lg visible-md" style="background:url(/front/images/content/concept/infobg.png) no-repeat center;">
                    <img src="/front/images/content/concept/bg1.png" class="visible-lg visible-md"  style="position: relative;
z-index: 99;" /><br /><br /><br /><br /><br /><br />
                <h4 class="uppercase hr-mid" style="padding-top:100px;">
                    <a href="#congress"><span style="background:#f4f5f5; padding:5px 0;"><i class="fa fa-users" style="color:#de1f29;"></i> Congress</span></a>
                </h4>
                    <img src="/front/images/content/concept/circless.png" style="position: relative;
z-index: 99;" /><br /><br /><br />
                    <h4 class="uppercase hr-mid" style="padding-top:100px;">
                        <a href="#report"><span style="background:#f4f5f5; padding:5px 0;"><i class="fa fa-file-text-o" style="color:#de1f29;"></i> Report</span></a>
                    </h4><br /><br /><br /><br /><br />
                    <p style="background:#f4f5f5; padding-top:5px;"><img src="/front/images/content/concept/small-circle.png" /><br />The report will summarize the results of<br />
                        research and discussions undertaken during<br />
                        the Congress.<br /><img src="/front/images/content/concept/small-circle.png" /><br /><br /><img src="/front/images/content/concept/big-circle.png" /></p>
                </div>
                <div class="col-md-4" >
                    <ul class="media-list">
                        <li class="media feature-left animated" data-fx="fadeInRight">
                            <div class="pull-left text-center">
                                <div class="square-icon-box square-icon-small">
                                    <img src="/front/images/content/concept/icon1.png" style="max-width: 70%;" />
                                </div>
                            </div>
                            <div class="media-body months">
                                <h4 class="media-heading uppercase">{{ $category->texts->months->title }}</h4>
                                <p>{{ $category->texts->months->content }}</p>
                            </div>
                        </li>
                        <li class="media feature-left animated" data-fx="fadeInRight">
                            <div class="pull-left text-center">
                                <div class="square-icon-box square-icon-small">
                                    <i class="fa fa-flag-o"></i>
                                </div>
                            </div>
                            <div class="media-body states">
                                <h4 class="media-heading uppercase">{{ $category->texts->states->title }}</h4>
                                <p>{{ $category->texts->states->content }}
                                </p>
                            </div>
                        </li>
                        <li class="media feature-left animated" data-fx="fadeInRight" style="margin-top: 26px;">
                            <div class="pull-left text-center">
                                <div class="square-icon-box square-icon-small">
                                    <img src="/front/images/content/concept/arrow.png" style="max-width: 70%;top:-5px;position:relative;" />
                                </div>
                            </div>
                            <div class="media-body goalsAndFormula">
                                <h4 class="media-heading uppercase">{{ $category->texts->goalsAndFormula->title }}</h4>
                                <p>{{ $category->texts->goalsAndFormula->content }}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row hidden-lg hidden-md">
                <ul class="media-list">
                    <li class="media feature-right-bottom animated" data-fx="fadeInLeft">
                        <div class="pull-left text-center">
                            <div class="square-icon-box square-icon-small">
                                21
                            </div>
                        </div>
                        <div class="media-body text-left">
                            <h4 class="media-heading uppercase">{{ $category->texts->specjalistPanels->title }}</h4>
                            <p>{{ $category->texts->specjalistPanels->content }}
                            </p>
                        </div>
                    </li>
                    <li class="media feature-left animated" data-fx="fadeInRight">
                        <div class="pull-left text-left">
                            <div class="square-icon-box square-icon-small">
                                <img src="/front/images/content/concept/icon1.png" style="max-width: 70%; left: 9px;
position: relative; top:-3px;" />
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading uppercase">{{ $category->texts->months->title }}</h4>
                            <p>{{ $category->texts->months->content }}</p>
                        </div>
                    </li>
                    <li class="media feature-left animated" data-fx="fadeInRight">
                        <div class="pull-left text-center">
                            <div class="square-icon-box square-icon-small">
                                <i class="fa fa-flag-o"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading uppercase">{{ $category->texts->states->title }}</h4>
                            <p>{{ $category->texts->states->content }}
                            </p>
                        </div>
                    </li>


                </ul>
                <h4 class="uppercase hr-mid text-center" style="padding-top:50px;">
                    <i class="fa fa-users" style="color:#de1f29;"></i> Congress
                </h4>
                <ul class="media-list">
                    <li class="media feature-right-bottom animated" data-fx="fadeInLeft">
                        <div class="pull-left text-center">
                            <div class="square-icon-box square-icon-small">
                                <img src="/front/images/content/concept/3days.png" style="max-width: 60%;" />
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading uppercase">3 days</h4>
                            <p>Congress duration<br /><br /></p>
                        </div>
                    </li>
                    <li class="media feature-left animated" data-fx="fadeInRight">
                        <div class="pull-left text-center">
                            <div class="square-icon-box square-icon-small">
                                <img src="/front/images/content/concept/arrow.png" style="max-width: 70%;top:-5px;position:relative;" />
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading uppercase">{{ $category->texts->goalsAndFormula->title }}</h4>
                            <p>{{ $category->texts->goalsAndFormula->content }}
                            </p>
                        </div>
                    </li>
                    <li class="media feature-right-bottom animated" data-fx="fadeInLeft">
                        <div class="pull-left text-center">
                            <div class="square-icon-box square-icon-small">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading uppercase">{{ $category->texts->participants->title }}</h4>
                            <p>{{ $category->texts->participants->content }}</p>
                        </div>
                    </li>
                </ul>
                <h4 class="uppercase hr-mid text-center" style="padding-top:50px;">
                    <i class="fa fa-file-text-o" style="color:#de1f29;"></i> Report
                </h4>
                <p class="text-center media feature-right-bottom animated" data-fx="fadeInLeft"><img src="/front/images/content/concept/small-circle.png" /><br /><br />The report will summarize the results of<br />
                    research and discussions undertaken during<br />
                    the Congress.<br /><br /><img src="/front/images/content/concept/small-circle.png" /><br /><br /><img src="/front/images/content/concept/big-circle.png" /></p>
            </div>
        </div>
    </section>
<div class="container"  id="about-the-project" style="padding-bottom:60px;"></div>
<section class="media-section darkbg" style="background:#20221f;" >
    <div class="inner" style=" padding:30px 0;">
        <div class="text-center">
            <h1 class="uppercase hr-mid">{{ $category->texts->aboutTheProject->title }}</h1>
        </div>
    </div>
</section>
<section class="section" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ $category->texts->aboutTheProject->content }}
            </div>
        </div>
    </div>
</section>
<div class="container"  id="research" style="padding-bottom:60px;" ></div>
<section class="media-section darkbg" style="background:#20221f;" >
    <div class="inner" style=" padding:30px 0;">
        <div class="text-center">
            <h1 class="uppercase hr-mid">{{ $category->texts->stageIresearch->title }}</h1>
        </div>
    </div>
</section>
<section class="section" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ $category->texts->stageIresearch->content }}
            </div>
        </div>
    </div>
</section>
<div class="container"  id="congress" style="padding-bottom:60px;"></div>
<section class="media-section darkbg" style="background:#20221f;" >
    <div class="inner" style=" padding:30px 0;">
        <div class="text-center">
            <h1 class="uppercase hr-mid">{{ $category->texts->stageIICongress->title }}</h1>
        </div>
    </div>
</section>
<section class="section" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ $category->texts->stageIICongress->content }}
            </div>
        </div>
    </div>
</section>
<div class="container"  id="report" style="padding-bottom:60px;"></div>
<section class="media-section darkbg" style="background:#20221f;" >
    <div class="inner" style=" padding:30px 0;">
        <div class="text-center">
            <h1 class="uppercase hr-mid">{{ $category->texts->stageIIIreport->title }}</h1>
        </div>
    </div>
</section>
<section class="section" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ $category->texts->stageIIIreport->content }}
            </div>
        </div>
    </div>
</section>
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