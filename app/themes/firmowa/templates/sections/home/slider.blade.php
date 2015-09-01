@if(isset($category->galleries->sliderTop))
	<section class="main-banner-static" style="background-image: url('/uploads/media/{{ $category->galleries->mainBannerStatic[0]->realname }}');">
		<div class="container-fluid desc">
			<span>{{ $category->galleries->mainBannerStatic[0]->pivot->content }}</span>
		</div>
		<a href="#{{ trans('routes.home_brands_ourbrands') }}" class="icon-arrow-down scrollToEl"></a>
	</section>
	<section class="main-slider">
		<ul class="main-slider-slides">
			@foreach ($category->galleries->sliderTop as $k => $media)
				<li>
					<span class="slide" style="background-image: url('/uploads/media/{{ $media->realname }}');"></span>
				</li>
			@endforeach
		</ul>
		<ul class="main-slider-desc">
			@foreach ($category->galleries->sliderTop as $k => $media)
				@if (strpos($media->pivot->content, 'li') > 0)
					{{ $media->pivot->content }}
				@else
					<li class="desc position-middle">
						{{ $media->pivot->content }}
					</li>
				@endif
			@endforeach
		</ul>
		<span class="slider-timer"></span>
		<nav class="slider-buttons">
			<button class="left"></button>
			<button class="right"></button>
		</nav>
	</section>
@endif