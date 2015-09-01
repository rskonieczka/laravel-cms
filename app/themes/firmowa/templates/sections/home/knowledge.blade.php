<div class="knowledge-base hidden-xs hidden-sm" id="{{ trans('routes.home_knowledge_base') }}">
    <div class="container-fluid">
        <h2>{{ renderText($category->texts, 'knowlageSection', 'title') }}</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="knowledge-base__notes">
                    {{ renderText($category->texts, 'knowlageSection', 'content') }}
                </div>
                <h5>{{ trans('interface.home_knowledge_more') }}</h5>
                {{-- @todo Zmienic na zaczytywanie 3 ostatnich dodanych --}}
                <ul class="list-unstyled knowledge-base__list">
                    <li><a href="{{ URL::to(trans('routes.home_knowledge_application')) }}">{{ trans('interface.home_knowledge_application') }}<span class="icon-arrow-right"></span></a></li>
                    <li><a href="{{ URL::to(trans('routes.home_knowledge_exploitation')) }}">{{ trans('interface.home_knowledge_exploitation') }}<span class="icon-arrow-right"></span></a></li>
                    <li><a href="{{ URL::to(trans('routes.home_knowledge_appexp')) }}">{{ trans('interface.home_knowledge_appexp') }}<span class="icon-arrow-right"></span></a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="{{ URL::to('assets/firmowa/img/knowledge-base.png') }}" class="img-responsive">
            </div>
        </div>
    </div>
</div>