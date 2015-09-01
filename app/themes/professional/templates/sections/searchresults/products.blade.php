<span class="searchlist-info">{{ Lang::get('common.searchresults_count_product', array('count' => count($list['product']))) }}</span>
<ul class="search-product-list">
	@foreach ($list['product'] as $item)
		<li>
			<a href="{{ URL::to($item->link) }}">
				<span class="picture">
					@foreach($item->gallery as $key => $image)
						@if($key==0){{ renderImage('product_gallery/', $image->realname, "searchlist", false, true ) }}@endif
					@endforeach
				</span>
				<a href="{{ URL::to($item->link) }}"><span class="name">{{ $item->name }}</span></a>
			</a>
		</li>
	@endforeach
</ul>