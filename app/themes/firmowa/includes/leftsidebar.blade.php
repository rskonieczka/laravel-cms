<aside>
    <ul class="list-unstyled aside-menu">
        @foreach ($category->subnavbar as $index => $item)
            <li class="@if ($category->id == $item->id) active @endif @if (count($item->childs) > 0 || count($item->knowledges) > 0) has-more @endif">
                <a @if (count($item->childs) > 0) class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" @else href="{{ URL::to(trans('common.lang_prefix').$item->slug) }}" @endif >
                    <span class="text-link">{{ $item->name }}</span>
                </a>
                @if (count($item->childs) > 0)
                    <ul class="list-unstyled">
                        @foreach ($item->childs as $child)
                            <li><a href="{{ URL::to(trans('common.lang_prefix').$child->slug) }}">{{ $child->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
                @if (count($item->knowledges) > 0)
                    <ul class="list-unstyled" @if ($category->id == $item->id) style="display: block;" @endif>
                        @foreach ($item->knowledges as $knowledgee)
                            <li class="@if (isset($knowledge) && $knowledge->id == $knowledgee->id) active @endif">
                                <a href="{{ URL::to(trans('common.lang_prefix').$item->slug.'/'.$knowledgee->id.'/'.Slugify::slugify($knowledgee->title)) }}">{{ $knowledgee->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</aside>