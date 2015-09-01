<div class="about-company" id="{{ trans('routes.home_movie_aboutcompany') }}">
    <video id="example_video_1" class="video-js vjs-default-skin" controls autoplay muted preload="auto" width="640"
           height="264"
           poster="{{ URL::to('assets/firmowa/img/video_cover.jpg') }}"
           data-setup="{}">
        <source src="{{ URL::to(trans('routes.company_video_mp4')) }}" type='video/mp4' />
        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
    </video>
    <div class="container-fluid">
        <h2>{{ renderText($category->texts, 'companySection', 'title') }}</h2>
        <div class="row">
            <div class="col-md-6 col-md-offset-6">
                <div class="about-company__note" id="aboutCompanyNote">
                    <div class="icon-link-right" id="showCompanyContent"></div>
                    <div class="about-company__content" id="aboutCompanyContent">
                        {{ renderText($category->texts, 'companySection', 'content') }}
                    </div>
                    <p class="more">
                        <a class="btn btn-default" href="{{ URL::to(trans('routes.home_movie_readmore')) }}">{{ trans('interface.home_company_readmore') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>