@extends('theme::layout.master')

@section('template')
	<div id="content">
		<div class="container-fluid">
			@include('theme::includes.breadcrumbs')
			@include('theme::includes.productsidebar')
			<div id="main-content">
				<ul class="products-list">
                    @foreach($products as $product)
                        <li>
                            <a href="{{ URL::to(trans('routes.product_list')."{$product->id}/".Slugify::slugify($product->name)) }}">
							<span class="picture">
                                @foreach($product->gallery->toArray() as $key => $image)
                                    @if($key==0){{ renderImage('product_gallery/', $image['realname'], "searchlist", false, true ) }}@endif
                                @endforeach
							</span>
                                <span class="name">{{ $product->name }}</span>
                            </a>
                        </li>
                    @endforeach
				</ul>
                {{ $products->links('theme::includes.pagination') }}
			</div>
		</div>
	</div>
@stop