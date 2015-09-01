<header id="header" class="nav-bar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand logo" href="{{ URL::to(trans('common.lang_prefix')) }}">
			<img alt="NOVOL PROFESSIONAL" title="NOVOL PROFESSIONAL" src="{{ imgAsset('professional', 'logo.png') }}">
		</a>
		<button class="header-burger icon-burger"></button>
		<div class="header-content">
			<button class="header-arrow icon-arrow"></button>
			<div class="dropdown language">
				<button class="btn btn-default dropdown-toggle" type="button" id="language" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<span class="icon-lang-{{ $category->lang }}"></span>{{ $currentFullLang }}
					<span class="icon-language-arrow"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="language">
                    @foreach(Config::get('app.langs') as $lang)
                        <li><a href="@if ($lang === 'pl'){{ '/' }}@else{{ '/'.$lang }}@endif"><span class="icon-lang-{{ $lang }}"></span>{{ trans('common.navbar_'.$lang.'_long') }}</a></li>
                    @endforeach
				</ul>
			</div>
            <form class="navbar-form" role="search" action="{{ URL::to(trans('common.navbar_searchlink')) }}" method="GET">
                <input type="text" class="form-control search-input" name="query" placeholder="{{ trans('common.navbar_input_query') }}"  data-message="{{ trans('common.navbar_input_message') }}" data-placeholder="{{ trans('common.navbar_input_query') }}">
				<input type="hidden" name="d" value="desktop">
                <button type="submit" class="btn search-button">
                    <span class="icon-search"></span>
                </button>
            </form>
			<nav id="main-menu">
				<ul class="nav navbar-nav">
                    @foreach ($category->navbar as $index => $item)
                        @if(!empty($item->childs))
                            @if($item->slug == trans('routes.menu_products'))
                                <li class="dropdown @if(isset($item->active)) active @endif @if($item->slug == "/") hidden-xs hidden-sm @endif">
                                    <button class="btn btn-default dropdown-toggle products-main-menu" id="nav-elem-{{ $index }}">
                                        {{ $item->name }}
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu products-menu" aria-labelledby="nav-elem-{{ $index }}">
                                        <div class="container-fluid">
                                            <ul class="nav nav-tab nav-justifieds" role="tablist">
												@foreach ($item->childs as $indexChilds => $child)
													<li role="presentation" class="@if($indexChilds == 0) active @endif">
														<a @if(isExternal($child->slug)) target="_blank" @endif href="#{{ Slugify::slugify($child->name) }}" aria-controls="{{ Slugify::slugify($child->name) }}" role="tab" data-toggle="tab">{{ $child->name }}</a>
													</li>
												@endforeach
                                            </ul>
                                            <div class="tab-content navbar-tab-content scrollbar-inner">
                                                @foreach ($item->childs as $indexChilds => $child)
                                                    <div role="tabpanel" class="tab-pane @if($indexChilds == 0) active @endif" id="{{ Slugify::slugify($child->name) }}">
                                                        @if(!empty($child->childs) && !$child->products)
                                                            @foreach($child->childs as $key => $child2)
																<div class="col-md-4 col-sm-4">
																	<h3 class="product-category-name">{{ $child2->name }}</h3>
																	@if(!empty($child2->products))
																		<ul class="unordered-list product-category-list">
																			@foreach($child2->products as $prod)
																				<li><a href="{{ URL::to(trans('routes.professional_product').'/'.$prod->product_id.'/'.Slugify::slugify($prod->name)) }}" title="{{ $prod->name }}">{{ $prod->name }}</a></li>
																			@endforeach
																		</ul>
																	@endif
																</div>
																@if (($key + 1) % 3 == 0)
																	<div class="product-category-separator"></div>
																@endif
                                                            @endforeach
                                                        @else
															<div class="col-md-12 product-category-inline">
																@if(!empty($child->products))
																	<ul class="unordered-list product-category-list">
																		@foreach($child->products as $prod2)
																			<li><a href="{{ URL::to(trans('routes.professional_product').'/'.$prod2->product_id.'/'.Slugify::slugify($prod2->name)) }}" title="{{ $prod2->name }}">{{ $prod2->name }}</a></li>
																		@endforeach
																	</ul>
																@endif
															</div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="dropdown sub-menu">
                                    <a class="btn btn-default dropdown-toggle" type="button" href="{{ URL::to($item->slug) }}">
                                        {{ $item->name }}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($item->childs as $child)
                                            <li><a href="{{ URL::to($langPrefix.$child->slug) }}">{{ $child->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @else
							<li class="@if ($category->slug == $item->slug) active @endif @if(isset($item->active)) active @endif @if($item->slug == "/") hidden-xs hidden-sm @endif">
								<a @if(strpos($item->slug, "#") !== false) class="navbar-link scroll-to" @else class="navbar-link home" @endif @if(strpos($item->slug, "#") !== false) data-scroll="{{ $item->slug }}" @endif href="{{ URL::to($item->slug) }}">
									@if($item->slug == "/") <span class="icon-home"></span> @else {{ $item->name }} @endif
								</a>
							</li>
                        @endif
                    @endforeach
				</ul>
				<div class="navbar-mobile">
					<ul @if (isset($moveMobile)) style="transform: translateX({{ $moveMobile }});" @endif >
						@foreach ($category->navbar as $index => $item)
							@if(!empty($item->childs))
								<li @if ( branchIsActive($item->childs, $item->slug, $item) )class="active"@endif >
									<a class="has-more" data-level="1" href="{{ URL::to($item->slug) }}">{{ $item->name }}</a>
									<ul class="level-1">
										<li>
											<a class="back" data-level="0" href="#">Powrót</a>
										</li>
										@foreach ($item->childs as $child)
                                            <li @if ( branchIsActive($child->childs, $child->slug, $child) )class="active"@endif>

												@if($item->slug == trans('routes.menu_products'))
													@if(!empty($child->childs) && !$child->products)
														<a class="has-more" data-level="2" href="{{ URL::to($child->slug) }}">{{ $child->name }}</a>
														<ul class="level-2">
															<li>
																<a class="back" data-level="1" href="#">Powrót</a>
															</li>
															@foreach($child->childs as $child2)
																<li @if ( branchIsActive($child2->childs, $child2->slug, $child2) )class="active"@endif>
																	@if(!empty($child2->products))
																		<a class="has-more" data-level="3" href="#">{{ $child2->name }}</a>
																		<ul class="level-3">
																			<li>
																				<a class="back" data-level="2" href="#">Powrót</a>
																			</li>
																			@foreach($child2->products as $child3)
																				<li @if ( branchIsActive($child3->childs, $child3->slug, false, $child3) )class="active"@endif>
																					<a href="{{ URL::to(trans('routes.professional_product').'/'.$child3->product_id.'/'.Slugify::slugify($child3->name)) }}" title="{{ $child3->name }}">{{ $child3->name }}</a>
																				</li>
																			@endforeach
																		</ul>
																	@endif
																</li>
															@endforeach
														</ul>
													@else
														<a class="has-more" data-level="2" href="{{ URL::to($child->slug) }}">{{ $child->name }}</a>
														@if(!empty($child->products))
															<ul class="level-2">
																<li>
																	<a class="back" data-level="1" href="#">Powrót</a>
																</li>
																@foreach($child->products as $child3)
																	<li @if ( branchIsActive($child3->childs, $child3->slug, false, $child3) )class="active"@endif>
																		<a href="{{ URL::to(trans('routes.professional_product').'/'.$child3->product_id.'/'.Slugify::slugify($child3->name)) }}" title="{{ $child3->name }}">{{ $child3->name }}</a>
																	</li>
																@endforeach
															</ul>
														@endif
													@endif
												@else
													@if ($child->slug === trans('routes.menu_cards'))

														<a class="has-more" data-level="2" href="{{ URL::to($child->slug) }}">{{ $child->name }}</a>
														<ul class="level-2">
															<li @if ( branchIsActive($child->childs, $child->slug, $child) )class="active"@endif>
																<a class="back" data-level="1" href="#">Powrót</a>
															</li>
															@foreach ($category->cardsSubnavbar as $index => $cat)
                                                                @foreach ($cat->childs as $subcat)
                                                                    <li @if ( branchIsActive($subcat->childs, $subcat->slug, $subcat) )class="active"@endif>
                                                                        @if(count($subcat->childs) > 0)
                                                                            <a class="has-more" data-level="3" href="{{ URL::to($subcat->slug) }}" title="{{ $subcat->name }}">{{ $subcat->name }}</a>
                                                                            <ul class="level-3">
                                                                                <li>
                                                                                    <a class="back" data-level="2" href="#">Powrót</a>
                                                                                </li>
                                                                                @foreach ($subcat->childs as $child)
                                                                                    <li  @if ( branchIsActive($child->childs, $child->slug, $child) )class="active"@endif>
                                                                                        <a href="{{ URL::to($child->slug) }}" title="{{ $child->name }}">{{ $child->name }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @else
                                                                            <a href="{{ URL::to($subcat->slug) }}" title="{{ $subcat->name }}">{{ $subcat->name }}</a>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
															@endforeach
														</ul>
													@else
														<a href="{{ URL::to($child->slug) }}">{{ $child->name }}</a>
													@endif
												@endif
											</li>
                                        @endforeach
									</ul>
								</li>
							@else
								@if($item->slug != "/")
									<li @if ($item->slug === "/#kontakt") class="contact-desktop-item" @endif >
										<a @if(strpos($item->slug, "#") !== false) class="scroll-to" data-scroll="{{ $item->slug }}" @endif href="{{ URL::to($item->slug) }}">{{ $item->name }}</a>
									</li>
								@endif
							@endif
						@endforeach
						<li class="contact-mobile-item @if ($category->slug == 'dane-firmy' || $category->slug == 'przedstawiciele-regionalni' || $category->slug == 'marketing' || $category->slug == 'szkolenia' || $category->slug == 'dzial-sprzedazy') active @endif">
							<a class="has-more" data-level="1" href="{{ URL::to('kontakt') }}">Kontakt</a>
							<ul class="level-1">
								<li>
									<a class="back" data-level="0" href="#">Powrót</a>
								</li>
								<li>
									<a @if ($category->slug == 'dane-firmy') class="active" @endif href="{{ URL::to('dane-firmy') }}">Dane firmy</a>
								</li>
								<li>
									<a @if ($category->slug == 'przedstawiciele-regionalni') class="active" @endif href="{{ URL::to('przedstawiciele-regionalni') }}">Przedstawiciele regionalni</a>
								</li>
								<li>
									<a @if ($category->slug == 'marketing') class="active" @endif href="{{ URL::to('marketing') }}">Marketing </a>
								</li>
								<li>
									<a @if ($category->slug == 'szkolenia') class="active" @endif href="{{ URL::to('szkolenia') }}">Szkolenia</a>
								</li>
								<li>
									<a @if ($category->slug == 'dzial-sprzedazy') class="active" @endif href="{{ URL::to('dzial-sprzedazy') }}">Dział sprzedaży</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</header>