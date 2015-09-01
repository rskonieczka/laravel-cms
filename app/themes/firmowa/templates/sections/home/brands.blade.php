<div id="{{ trans('routes.home_brands_ourbrands') }}">
	<div class="our-brands-small visible-xs visible-sm">
		<div class="container-fluid">
			<h2>{{ renderText($category->texts, 'ourBrandsMobileTitle', 'content') }}</h2>
			<ul>
				<li>
					<a href="{{ URL::to(trans('routes.home_brands_professional')) }}">
						<img src="assets/firmowa/img/our-brands-small-1@2x.png" style="width:213px">
					</a>
					<div class="text">{{ renderText($category->texts, 'ourBrandsMobile1', 'content') }}</div>
				</li>
				<li>
					@if(App::getLocale() == 'ch')
						<img src="assets/firmowa/img/our-brands-small-2@2x-grey.png" style="width:184px">
					@else
						<a href="{{ URL::to(trans('routes.home_brands_spectral')) }}">
							<img src="assets/firmowa/img/our-brands-small-2@2x.png" style="width:184px">
						</a>
					@endif
					<div class="text">{{ renderText($category->texts, 'ourBrandsMobile2', 'content') }}</div>
				</li>
                <li>
                    <a href="{{ URL::to('//'.getSiteDomainByName('Professional').'/'.trans('routes.professional_spray')) }}">
                        <img src="assets/firmowa/img/our-brands-small-10@2x.png" style="width: 201px;">
                    </a>
                    <div class="text">{{ renderText($category->texts, 'ourBrandsMobile10', 'content') }}</div>
                </li>
                <li>
                    <a href="{{ URL::to('//'.getSiteDomainByName('Professional').'/'.trans('routes.professional_extras')) }}">
                        <img src="assets/firmowa/img/our-brands-small-1@2x.png" style="width: 201px;">
                    </a>
                    <div class="text">{{ renderText($category->texts, 'ourBrandsMobile11', 'content') }}</div>
                </li>
                <li>
                    @if(App::getLocale() == 'ch' || App::getLocale() == 'fr')
                        <img src="assets/firmowa/img/our-brands-small-8@2x-grey.png" style="width:128px">
                    @else
                        <a href="{{ URL::to(trans('routes.home_brands_ultraline')) }}">
                            <img src="assets/firmowa/img/our-brands-small-8@2x.png" style="width:128px">
                        </a>
                    @endif
                    <div class="text">{{ renderText($category->texts, 'ourBrandsMobile8', 'content') }}</div>
                </li>
                @if(App::getLocale() != 'pl')
                    <li>
                        @if(App::getLocale() != 'en')
                            <img src="assets/firmowa/img/our-brands-small-9@2x-grey.png" style="width:142px">
                        @else
                            <a href="{{ URL::to(trans('routes.home_brands_impact')) }}">
                                <img src="assets/firmowa/img/our-brands-small-9@2x.png" style="width:142px">
                            </a>
                        @endif
                        <div class="text">{{ renderText($category->texts, 'ourBrandsMobile9', 'content') }}</div>
                    </li>
                @endif
                <li>
                    @if(App::getLocale() == 'ru' || App::getLocale() == 'ch' || App::getLocale() == 'fr')
                        <img src="assets/firmowa/img/our-brands-small-4@2x-grey.png" style="width:150px">
                    @else
                        <a href="{{ URL::to(trans('routes.home_brands_classiccar')) }}">
                            <img src="assets/firmowa/img/our-brands-small-4@2x.png" style="width:150px">
                        </a>
                    @endif
                    <div class="text">{{ renderText($category->texts, 'ourBrandsMobile4', 'content') }}</div>
                </li>
				<li>
					@if(App::getLocale() == 'ch' || App::getLocale() == 'fr')
						<img src="assets/firmowa/img/our-brands-small-3@2x-grey.png" style="width:198px">
					@else
						<a href="{{ URL::to(trans('routes.home_brands_industrial')) }}">
							<img src="assets/firmowa/img/our-brands-small-3@2x.png" style="width:198px">
						</a>
					@endif
					<div class="text">{{ renderText($category->texts, 'ourBrandsMobile3', 'content') }}</div>
				</li>
                <li>
                    @if(App::getLocale() == 'de' || App::getLocale() == 'ch' || App::getLocale() == 'fr')
                        <img src="assets/firmowa/img/our-brands-small-7@2x-grey.png" style="width:176px">
                    @else
                        <a href="{{ URL::to(trans('routes.home_brands_novofloor')) }}">
                            <img src="assets/firmowa/img/our-brands-small-7@2x.png" style="width:176px">
                        </a>
                    @endif
                    <div class="text">{{ renderText($category->texts, 'ourBrandsMobile7', 'content') }}</div>
                </li>

                <li>
                    @if(App::getLocale() == 'de' || App::getLocale() == 'ch' || App::getLocale() == 'fr')
                        <img src="assets/firmowa/img/our-brands-small-6@2x-grey.png" style="width:142px">
                    @else
                        <a href="{{ URL::to(trans('routes.home_brands_supra')) }}">
                            <img src="assets/firmowa/img/our-brands-small-6@2x.png" style="width:142px">
                        </a>
                    @endif
                    <div class="text">{{ renderText($category->texts, 'ourBrandsMobile6', 'content') }}</div>
                </li>
				<li>
					@if(App::getLocale() == 'de' || App::getLocale() == 'ru' || App::getLocale() == 'ch' || App::getLocale() == 'fr')
						<img src="assets/firmowa/img/our-brands-small-5@2x-grey.png" style="width:170px">
					@else
						<a href="{{ URL::to(trans('routes.home_brands_nautic')) }}">
							<img src="assets/firmowa/img/our-brands-small-5@2x.png" style="width:170px">
						</a>
					@endif
					<div class="text">{{ renderText($category->texts, 'ourBrandsMobile5', 'content') }}</div>
				</li>

			</ul>
		</div>
	</div>
	<div class="our-brands hidden-xs hidden-sm">
		<div class="container-fluid">
			<h2>{{ renderText($category->texts, 'ourBrandsMobileTitle', 'content') }}</h2>
			<div class="row">
				<div class="row-md-height">
					<div class="col-md-6 col-md-height col-middle">
						<a href="{{ URL::to(trans('routes.home_brands_professional')) }}" class="our-brands__img our-brands__img--1">
							<img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/professional-logo-color.png') }}" />
						</a>
					</div>
					<div class="col-md-6 col-md-height col-middle">
						<h3>Professional</h3>
						{{ renderText($category->texts, 'ourBrandsMobile1', 'content') }}
					</div>
				</div>
			</div>
			<div class="row @if(App::getLocale() == 'ch'){{ 'no-active' }}@endif">
				<div class="row-md-height">
					<div class="col-md-6 col-md-height col-middle text-right">
						<h3>Spectral</h3>
						{{ renderText($category->texts, 'ourBrandsMobile2', 'content') }}
					</div>
					<div class="col-md-6 col-md-height col-middle">
						@if(App::getLocale() == 'ch')
							<span class="our-brands__img our-brands__img--2"></span>
						@else
							<a href="{{ URL::to(trans('routes.home_brands_spectral')) }}" class="our-brands__img our-brands__img--2">
								<img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/spectral-logo-color.png') }}" />
							</a>
						@endif
					</div>
				</div>
			</div>
            <div class="row">
                <div class="row-md-height">
                    @if(App::getLocale() === 'pl')
                        <div class="col-md-6 col-md-height col-middle">
                            <a href="{{ URL::to('//'.getSiteDomainByName('Professional').'/'.trans('routes.professional_spray')) }}" class="our-brands__img our-brands__img--10">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/spray-logo-color.png') }}" />
                            </a>
                        </div>
                        <div class="col-md-6 col-md-height col-middle text-left">
                            <h3>Spray Line</h3>
                            {{ renderText($category->texts, 'ourBrandsMobile10', 'content') }}
                        </div>
                    @else
                        <div class="col-md-6 col-md-height col-middle">
                            <a href="{{ URL::to('//'.getSiteDomainByName('Professional').'/'.trans('routes.professional_spray')) }}" class="our-brands__img our-brands__img--10">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/spray-logo-color.png') }}" />
                            </a>
                        </div>
                        <div class="col-md-6 col-md-height col-middle text-left">
                            <h3>Spray Line</h3>
                            {{ renderText($category->texts, 'ourBrandsMobile10', 'content') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="row-md-height">
                    @if(App::getLocale() === 'pl')
                        <div class="col-md-6 col-md-height col-middle text-right">
                            <h3>Materiały uzupełniające</h3>
                            {{ renderText($category->texts, 'ourBrandsMobile11', 'content') }}
                        </div>
                        <div class="col-md-6 col-md-height col-middle">
                            <a href="{{ URL::to('//'.getSiteDomainByName('Professional').'/'.trans('routes.professional_extras')) }}" class="our-brands__img our-brands__img--11">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/professional-logo-color.png') }}" />
                            </a>
                        </div>
                    @else
                        <div class="col-md-6 col-md-height col-middle text-right">
                            <h3 @if(App::getLocale() === 'ru') style="font-family: 'Open Sans'; font-size: 36px; font-weight: 400;" @endif>{{ trans('interface.brands_extras') }}</h3>
                            {{ renderText($category->texts, 'ourBrandsMobile11', 'content') }}
                        </div>
                        <div class="col-md-6 col-md-height col-middle">
                            <a href="{{ URL::to('//'.getSiteDomainByName('Professional').'/'.trans('routes.professional_extras')) }}" class="our-brands__img our-brands__img--11">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/professional-logo-color.png') }}" />
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row @if(App::getLocale() == 'ch' || App::getLocale() == 'fr'){{ 'no-active' }}@endif">
                <div class="row-md-height">
                    <div class="col-md-6 col-md-height col-middle">
                        @if(App::getLocale() == 'ch' || App::getLocale() == 'fr')
                            <span class="our-brands__img our-brands__img--8"></span>
                        @else
                            <a href="{{ URL::to(trans('routes.home_brands_ultraline')) }}" class="our-brands__img our-brands__img--8">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/ultra-line-logo.png') }}" />
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 col-md-height col-middle text-left">
                        <h3>Ultra</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile8', 'content') }}
                    </div>
                </div>
            </div>
            @if(App::getLocale() != 'pl')
                <div class="row @if(App::getLocale() != 'en'){{ 'no-active' }}@endif">
                    <div class="row-md-height">
                        <div class="col-md-6 col-md-height col-middle text-right">
                            <h3>Impact</h3>
                            {{ renderText($category->texts, 'ourBrandsMobile9', 'content') }}
                        </div>
                        <div class="col-md-6 col-md-height col-middle">
                            @if(App::getLocale() != 'en')
                                <span class="our-brands__img our-brands__img--9"></span>
                            @else
                                <a href="{{ URL::to(trans('routes.home_brands_impact')) }}" class="our-brands__img our-brands__img--9">
                                    <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/impact-logo-color.png') }}" />
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            <div class="row @if(App::getLocale() == 'ru' || App::getLocale() == 'ch' || App::getLocale() == 'fr'){{ 'no-active' }}@endif">
                <div class="row-md-height">
                    @if(App::getLocale() === 'pl')
                    <div class="col-md-6 col-md-height col-middle text-right">
                        <h3>Novol for classic car</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile4', 'content') }}
                    </div>
                    <div class="col-md-6 col-md-height col-middle">
                            <a href="{{ URL::to(trans('routes.home_brands_classiccar')) }}" class="our-brands__img our-brands__img--4">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/classic-cars-logo-white.png') }}" />
                            </a>
                    </div>
                    @else
                    <div class="col-md-6 col-md-height col-middle">
                        @if(App::getLocale() == 'ru' || App::getLocale() == 'ch' || App::getLocale() == 'fr')
                            <span class="our-brands__img our-brands__img--4"></span>
                        @else
                            <a href="{{ URL::to(trans('routes.home_brands_classiccar')) }}" class="our-brands__img our-brands__img--4">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/classic-cars-logo-white.png') }}" />
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 col-md-height col-middle text-left">
                        <h3>Novol for classic car</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile4', 'content') }}
                    </div>
                    @endif
                </div>
            </div>
			<div class="row @if(App::getLocale() == 'ch' || App::getLocale() == 'fr'){{ 'no-active' }}@endif">
				<div class="row-md-height">
                    @if(App::getLocale() === 'pl')
					<div class="col-md-6 col-md-height col-middle">
							<a href="{{ URL::to(trans('routes.home_brands_industrial')) }}" class="our-brands__img our-brands__img--3">
								<img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/our-brand-industrial-logo-white.png') }}" />
							</a>
					</div>
					<div class="col-md-6 col-md-height col-middle">
						<h3>Industrial</h3>
						{{ renderText($category->texts, 'ourBrandsMobile3', 'content') }}
					</div>
                    @else
                    <div class="col-md-6 col-md-height col-middle text-right">
                        <h3>Industrial</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile3', 'content') }}
                    </div>
                    <div class="col-md-6 col-md-height col-middle">
                    @if(App::getLocale() == 'ch' || App::getLocale() == 'fr')
                        <span class="our-brands__img our-brands__img--3"></span>
                    @else
                        <a href="{{ URL::to(trans('routes.home_brands_industrial')) }}" class="our-brands__img our-brands__img--3">
                            <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/our-brand-industrial-logo-white.png') }}" />
                        </a>
                    @endif
                    </div>
                    @endif
				</div>
			</div>
            <div class="row @if(App::getLocale() == 'de' || App::getLocale() == 'ch' || App::getLocale() == 'fr'){{ 'no-active' }}@endif">
                <div class="row-md-height">
                    @if(App::getLocale() === 'pl')
                    <div class="col-md-6 col-md-height col-middle text-right">
                        <h3>Novofloor</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile7', 'content') }}
                    </div>
                    <div class="col-md-6 col-md-height col-middle">
                            <a href="{{ URL::to(trans('routes.home_brands_novofloor')) }}" class="our-brands__img our-brands__img--7">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/novofloor-logo-white.png') }}" />
                            </a>
                    </div>
                    @else
                    <div class="col-md-6 col-md-height col-middle">
                        @if(App::getLocale() == 'de' || App::getLocale() == 'ch' || App::getLocale() == 'fr')
                            <span class="our-brands__img our-brands__img--7"></span>
                        @else
                            <a href="{{ URL::to(trans('routes.home_brands_novofloor')) }}" class="our-brands__img our-brands__img--7">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/novofloor-logo-white.png') }}" />
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 col-md-height col-middle text-left">
                        <h3>Novofloor</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile7', 'content') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="row @if(App::getLocale() == 'de' || App::getLocale() == 'ch' || App::getLocale() == 'fr'){{ 'no-active' }}@endif">
                <div class="row-md-height">
                    @if(App::getLocale() === 'pl')
                    <div class="col-md-6 col-md-height col-middle">
                            <a href="{{ URL::to(trans('routes.home_brands_supra')) }}" class="our-brands__img our-brands__img--6">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/supra-logo-white.png') }}" />
                            </a>
                    </div>
                    <div class="col-md-6 col-md-height col-middle text-left">
                        <h3>Supra</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile6', 'content') }}
                    </div>
                    @else
                    <div class="col-md-6 col-md-height col-middle text-right">
                        <h3>Supra</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile6', 'content') }}
                    </div>
                    <div class="col-md-6 col-md-height col-middle">
                            @if(App::getLocale() == 'de' || App::getLocale() == 'ch' || App::getLocale() == 'fr')
                                <span class="our-brands__img our-brands__img--6"></span>
                            @else
                                <a href="{{ URL::to(trans('routes.home_brands_supra')) }}" class="our-brands__img our-brands__img--6">
                                    <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/supra-logo-white.png') }}" />
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
			<div class="row @if(App::getLocale() == 'de' || App::getLocale() == 'ru' || App::getLocale() == 'ch' || App::getLocale() == 'fr'){{ 'no-active' }}@endif">
				<div class="row-md-height">
                    @if(App::getLocale() === 'pl')
                    <div class="col-md-6 col-md-height col-middle text-right">
                        <h3>Nautic</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile5', 'content') }}
                    </div>
					<div class="col-md-6 col-md-height col-middle">
							<a href="{{ URL::to(trans('routes.home_brands_nautic')) }}" class="our-brands__img our-brands__img--5">
								<img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/nautic-logo-white.png') }}" />
							</a>
					</div>
                    @else
                    <div class="col-md-6 col-md-height col-middle">
                        @if(App::getLocale() == 'de' || App::getLocale() == 'ru' || App::getLocale() == 'ch' || App::getLocale() == 'fr')
                            <span class="our-brands__img our-brands__img--5"></span>
                        @else
                            <a href="{{ URL::to(trans('routes.home_brands_nautic')) }}" class="our-brands__img our-brands__img--5">
                                <img class="our-brand-logo" src="{{ URL::to('assets/firmowa/img/nautic-logo-white.png') }}" />
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 col-md-height col-middle text-left">
                        <h3>Nautic</h3>
                        {{ renderText($category->texts, 'ourBrandsMobile5', 'content') }}
                    </div>
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>