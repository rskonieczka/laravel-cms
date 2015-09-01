<div class="events" id="{{ trans('routes.home_movie_events') }}">
    <div class="container-fluid">
        <h2>{{ trans('interface.home_news_title') }}</h2>
        <section id="news-container">
            @foreach($category->posts as $news)
            <article class="news-item">
                <figure>
                    <a href="{{ URL::to(trans('routes.newssingle').$news->id.'/'.Slugify::slugify($news->title)) }}" title="{{ $news->title }}">{{ renderImage('posts/', $news->photo, 'post') }}</a>
                </figure>

                <div>
                    <h3><a href="{{ URL::to(trans('routes.newssingle').$news->id.'/'.Slugify::slugify($news->title)) }}">{{ $news->title }}</a></h3>
                    <a href="{{ URL::to(trans('routes.newssingle').$news->id.'/'.Slugify::slugify($news->title)) }}"><p>{{ str_limit(strip_tags($news->content), $limit = 666, $end = '...') }}</p></a>
                    <a class="more" href="{{ URL::to(trans('routes.newssingle').$news->id.'/'.Slugify::slugify($news->title)) }}">{{ trans('interface.home_news_more') }}</a>
                </div>
            </article>
            @endforeach
        </section>
    </div>
</div>