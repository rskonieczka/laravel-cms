@extends('theme::layout.master')

@section('template')
	<div id="content">
		<div class="container-fluid">
			@include('theme::includes.breadcrumbs')
			@include('theme::includes.productsidebar')
			<div id="main-content">
				<article class="single-product">
					<h1>{{ $product->name }}</h1>
					@if (count($product->gallery) > 0)
						<div id="product-gallery">
							<ul>
								@foreach($product->gallery as $key => $image)
									<li @if ($key > 0) class="hide" @endif><img src="{{ renderImage('product_gallery/', $image->realname, false, false, false ) }}" /></li>
								@endforeach
							</ul>
							@if (count($product->gallery) > 1)
								<div class="arrows">
									<button class="arrow-left"></button>
									<button class="arrow-right"></button>
								</div>
							@endif
						</div>
					@endif
					
					<div class="product-info">
						@if (count($product->ghs) > 0 || count($product->media) > 0 || !empty($product->tech_card) || !empty($product->char_card))
							<div class="product-media">
								<h3>{{ trans('interface.single_downloads') }}</h3>
								<ul>
									@if (!empty($product->tech_card))
										<li><a class="download-link" href="{{ renderCardLink('karty/tech/',$product->tech_card, $langPrefix) }}">{{ trans('interface.single_technical') }}</a></li>
									@endif
									@if (!empty($product->char_card)) 
										<li><a class="download-link" href="{{ renderCardLink('karty/bezp/',$product->char_card,$langPrefix) }}">{{ trans('interface.single_characteristics') }}</a></li>
									@endif
									@foreach ($product->ghs as $key => $ghs)
										<li><a class="download-link" href="{{ URL::to('uploads/media/'.$ghs->realname) }}">{{ trans('interface.single_clp') }}</a></li>
									@endforeach
									@foreach ($product->media as $media)
										<li><a class="download-link" href="{{ URL::to('uploads/media/'.$media->realname) }}">@if (empty($media->name)) {{ $media->realname }} @else {{ $media->name }} @endif</a></li>
									@endforeach
								</ul>
							</div>
						@endif
						<div class="product-desc">
							{{ $product->description }}
							@if (!empty($product->voc))
								<div class="product-voc">
									<img src="{{ imgAsset('professional', 'voc.gif') }}" />
									<p>{{ $product->voc }}</p>
								</div>
							@endif
						</div>
					</div>
                    {{ $product->table }}
                    {{ $product->table_mobile }}
					{{ $product->icons }}
			   </article>
			</div>
		</div>
		@if (count($product->related) > 0)
			<section class="related-products">
				<h2>{{ trans('interface.single_recommend') }}</h2>
				<div class="container-fluid">
					<ul>
						@foreach($product->related as $related)
							<li class="@if ($related->special) special @endif">
								<a href="{{ URL::to(trans('routes.product_list').$related->id.'/'.Slugify::slugify($related->name)) }}">
									@if ($related->special)
										<mark class="product-marked">{{ trans('interface.single_specialoffer') }}</mark>
									@endif
									<div class="picture">
										@if (count($related->gallery) > 0)
											{{ Imagecache::get('product_gallery/' . $related->gallery->first()->realname, 'relatedProducts')->img_nosize; }}
										@endif
									</div>
									<span class="product-title">{{ $related->name }}</span>
								</a>
							</li>
						@endforeach
						
					</ul>
				</div>
			</section>
		@endif
	</div>
@stop