<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->		
		<form class="header-search" action="{{ URL::to(trans('common.navbar_searchlink')) }}" method="GET">
			<input type="text" class="form-control" placeholder="{{ trans('common.navbar_input_query') }}" name="query">
			<input class="submit" type="submit" value="{{ trans('common.navbar_button_search') }}" />
		</form>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			<button class="header-search-button icon-search"></button>
            <a class="navbar-brand" href="{{ URL::to(trans('common.lang_prefix')) }}">
                <span>Novol</span>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="collapse-cont">
				<ul class="nav navbar-nav navbar-nav-lang navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle">{{ $currentFullLang }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
                            @foreach(Config::get('app.langs') as $lang)
                                <li @if ($lang === 'ru') class="lang-dropdown-ru" @endif><a href="@if ($lang === 'pl'){{ '/' }}@else{{ '/'.$lang }}@endif"><img src="{{ URL::to('assets/firmowa/img/'.$lang.'.png') }}">{{ trans('common.navbar_'.$lang.'_long') }}</a></li>
                            @endforeach
						</ul>
					</li>
				</ul>
				<button class="header-search-button icon-search"></button>
				<ul class="nav navbar-nav navbar-right">
					@foreach ($category->navbar as $index => $item)
						<li class="@if ($item->slug == "/") hidden-xs hidden-sm @endif @if (count($item->childs) > 0) dropdown @endif @if(str_replace("/#", "", $item->slug) === trans('routes.home_contact_contact')) contact-mobile-item @endif" @if ( branchIsActive($item->childs, $item->slug, $item) || ifBranchHaveKnowledges($item->id, @$isKnowledge) ) data-dropdown="open" @endif >
							@if (count($item->childs) > 0)
								<a class="scrollToEl dropdown-toggle @if ( branchIsActive($item->childs, $item->slug, $item) ) active @endif" href="{{ getLink($item->slug) }}">
                                    <span class="text-link">{{ $item->name }}</span>
								</a>
								<ul class="dropdown-menu">
									@foreach ($item->childs as $child)
										@if (count($child->childs) > 0)
											<li class="dropdown @if ( branchIsActive($child->childs, $child->slug, $child)) active @endif">
												<a class="dropdown-toggle subdropdown-toggle" href="{{ getLink($child->slug) }}">{{ $child->name }}</a>
												<ul class="subdropdown-menu dropdown-menu">
													@foreach ($child->childs as $subchild)
														<li><a @if(isExternal($subchild->slug)) target="_blank" @endif class="@if ( branchIsActive($child->childs, $subchild->slug, $subchild) ) active @endif" href="{{ getLink($subchild->slug) }}">{{ $subchild->name }}</a></li>
													@endforeach
												</ul>
											</li>
										@else
											<li><a @if(isExternal($child->slug)) target="_blank" @endif class="@if ($category->id == $child->id) active @endif" href="{{ getLink($child->slug) }}">{{ $child->name }}</a></li>
										@endif
									@endforeach
								</ul>
							@elseif ($item->slug !== trans('routes.footer_career'))
								<a @if(isExternal($item->slug)) target="_blank" @endif @if ($item->slug == '/#kontakt' || $item->slug == '/#contact' ) id="kontakt-menu" data-slug="kontakt-mobile" data-lang="{{ App::getLocale() }}" @endif class="@if ($item->slug == "/") icon-home @else scrollToEl @endif @if ($category->id == $item->id) active @endif" href="{{ getLink($item->slug) }}">
									@if ($item->slug != "/")<span class="text-link">{{ $item->name }}</span>@endif
								</a>
							@endif
						</li>
					@endforeach
				</ul>
				<a href="#" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" class="icon-close visible-xs visible-sm"></a>
			</div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>