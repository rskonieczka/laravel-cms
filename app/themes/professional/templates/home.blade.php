@extends('theme::layout.master')

@section('template')
	<div id="content">
        @if(isset($category->galleries->sliderTop) && count($category->galleries->sliderTop) > 0)
            @if(isset($category->galleries->mainBannerStatic))
			<section class="main-banner-static" style="background-image: url('/uploads/media/{{ $category->galleries->mainBannerStatic[0]->realname }}');">
				<div class="container-fluid">
					    <span class="desc">{{ $category->galleries->mainBannerStatic[0]->pivot->content }}</span>
				</div>
				<a href="/#poznaj-nas" class="arrow scroll-to" data-scroll="#poznaj-nas"></a>
			</section>
            @endif
			<section class="main-slider">
				<ul class="main-slider-slides">
					@foreach ($category->galleries->sliderTop as $k => $media)
						<li>
							<span class="slide" style="background-image: url( '/uploads/media/{{ $media->realname }}' );" href="#"></span>
						</li>
					@endforeach
				</ul>
				<div class="slider-container">
					<ul class="main-slider-desc">
						@foreach ($category->galleries->sliderTop as $k => $media)
							<li class="desc @if($k==0) active @endif">
								{{ $media->pivot->content }}
							</li>
						@endforeach
					</ul>
					<div class="slider-page">
						<span class="slider-current-page">01</span>
						<span class="slider-page-count">/
							@if (count($category->galleries->sliderTop) < 10)
								0{{ count($category->galleries->sliderTop) }}
							@else
								{{ count($category->galleries->sliderTop) }}
							@endif
						</span>
					</div>
					<nav class="slider-buttons">
						<span class="timer"></span>
						<button class="left"></button>
						<button class="right"></button>
					</nav>
				</div>
			</section>
        @endif
		<section class="our-products" id="produkty">
			<h2 class="headline-2">{{ trans('interface.home_ourproducts') }}</h2>
			<ul class="our-products-list list-unstyled">
				<li class="our-product">
					<a class="product-link" href="{{ URL::to(trans('routes.professional_putties')) }}" title="Szpachlówki">
						<span class="product-category-go">{{ trans('interface.home_gotocategory') }}</span>
						<span class="product-image"  style="background-image: url({{ imgAsset('professional', 'szpachlowki.jpg') }});"></span>
						<h3 class="product-title">{{ trans('interface.home_putties') }}</h3>
					</a>
				</li>
				<li class="our-product">
					<a class="product-link" href="{{ URL::to(trans('routes.professional_varnishes')) }}" title="Podkłady i lakiery">
						<span class="product-category-go">{{ trans('interface.home_gotocategory') }}</span>
						<span class="product-image" style="background-image: url({{ imgAsset('professional', 'podklady-i-lakiery.jpg') }});"></span>
						<h3 class="product-title">{{ trans('interface.home_fillersclearcoats') }}</h3>
					</a>
				</li>
				<li class="our-product">
					<a class="product-link" href="{{ URL::to(trans('routes.professional_extras2')) }}" title="Dodatki">
						<span class="product-category-go">{{ trans('interface.home_gotocategory') }}</span>
						<span class="product-image" style="background-image: url({{ imgAsset('professional', 'dodatki.jpg') }});"></span>
						<h3 class="product-title">{{ trans('interface.home_extras') }}</h3>
					</a>
				</li>
				<li class="our-product">
					<a class="product-link" href="{{ URL::to(trans('routes.professional_extras')) }}" title="Materiały uzupełniające">
						<span class="product-category-go">{{ trans('interface.home_gotocategory') }}</span>
						<span class="product-image" style="background-image: url({{ imgAsset('professional', 'extras.jpg') }});"></span>
						<h3 class="product-title">{{ trans('interface.home_complementaries') }}</h3>
					</a>
				</li>
				<li class="our-product">
					<a class="product-link" href="{{ URL::to(trans('routes.professional_spray')) }}" title="Spray">
						<span class="product-category-go">{{ trans('interface.home_gotocategory') }}</span>
						<span class="product-image" style="background-image: url({{ imgAsset('professional', 'sprayline.jpg') }});"></span>
						<h3 class="product-title">{{ trans('interface.home_spray') }}</h3>
					</a>
				</li>
			</ul>
		</section>
        <section class="explore-us container-mw" id="poznaj-nas">
            <h2 class="headline-2">{{ trans('interface.home_meetus') }}</h2>
            <ul class="explore-us-list list-unstyled">
                <li>
                    <div class="explore-us-desc">
                        <div class="text">
                            {{ renderText($category->texts, 'meetUs', 'content') }}
                        </div>
                    </div>
                    @if(isset($category->galleries->exploreUsGallery) && count($category->galleries->exploreUsGallery) > 0)
                        <span class="explore-us-produkt">
                    @foreach ($category->galleries->exploreUsGallery as $k => $media)
                                <span class="explore-us-image" style="background-image: url('/uploads/media/{{ $media->realname }}');"></span>
                            @endforeach
                </span>
                    @endif
                </li>
            </ul>
        </section>
        @include('theme::templates.sections.home.contact_'.App::getLocale())
	</div>
@stop