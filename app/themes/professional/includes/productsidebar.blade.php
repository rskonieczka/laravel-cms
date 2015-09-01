<aside id="sidebar">
    <ul class="list-unstyled">
		@foreach ($productNavbar as $index => $cat)
			<li @if ( branchIsActive($cat->childs, $cat->slug, $cat) )class="active"@endif>
				<a class="category-name @if (count($cat->childs) > 0 || count($cat->products) > 0) has-more @endif" href="#">{{ $cat->name }}</a>
				@if (count($cat->childs) > 0)
					<ul class="list-unstyled" @if ( branchIsActive($cat->childs, $cat->slug, $cat) )style="display:block;"@endif>
						@foreach ($cat->childs as $subcat)
							<li @if ( branchIsActive($subcat->childs, $subcat->slug, $subcat) )class="active"@endif>
								<a class="subcategory-name @if (count($subcat->products) > 0) has-more @endif" href="#">{{ $subcat->name }}</a>
								@if (count($subcat->products) > 0)
									<ul class="list-unstyled" @if ( branchIsActive($subcat->childs, $subcat->slug, $subcat) )style="display:block;"@endif>
                                        @foreach ($subcat->products as $prod)
                                            <li @if ( branchIsActive($subcat->childs, $subcat->slug, false, $prod) )class="active"@endif><a class="item-name" href="{{ URL::to(trans('routes.product_list').$prod->product_id.'/'.Slugify::slugify($prod->name)) }}">{{ $prod->name }}</a></li>
                                        @endforeach
									</ul>
								@endif
							</li>
						@endforeach
					</ul>
				@endif
                @if (count($cat->products) > 0)
                    <ul class="list-unstyled" @if ( branchIsActive($cat->childs, $cat->slug, $cat) )style="display:block;"@endif>
                        @foreach ($cat->products as $prod2)
                            <li @if ( branchIsActive($cat->childs, $cat->slug, false, $prod2) )class="active"@endif><a class="item-name" href="{{ URL::to(trans('routes.product_list').$prod2->product_id.'/'.Slugify::slugify($prod2->name)) }}">{{ $prod2->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
			</li>
		@endforeach
    </ul>
</aside>