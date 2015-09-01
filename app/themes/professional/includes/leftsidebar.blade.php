<aside id="sidebar">
    <ul class="list-unstyled">
		@foreach ($category->subnavbar as $index => $cat)
			<li @if ( branchIsActive($cat->childs, $cat->slug) )class="active"@endif>
				<a @if (count($cat->childs) > 0) class="category-name has-more" href="#" @else class="category-name" href="{{ URL::to($cat->slug) }}" @endif>{{ $cat->name }}</a>
				@if (count($cat->childs) > 0)
					<ul class="list-unstyled" @if ($category->id == $cat->id) style="display: block;" @endif>
						@foreach ($cat->childs as $subcat)
							<li @if ( branchIsActive($subcat->childs, $subcat->slug) )class="active"@endif>
								<a @if (count($subcat->childs) > 0) class="subcategory-name has-more" href="#" @else class="subcategory-name" href="{{ URL::to($subcat->slug) }}" @endif>{{ $subcat->name }}</a>
								@if (count($subcat->childs) > 0)
									<ul class="list-unstyled">
                                        @foreach ($subcat->childs as $child)
                                            <li @if ( branchIsActive($child->childs, $child->slug) )class="active"@endif>
                                                <a class="item-name" href="{{ URL::to($child->slug) }}">{{ $child->name }}</a>
                                                @if (count($child->childs) > 0)
                                                    <ul class="list-unstyled">
                                                        @foreach ($child->childs as $child2)
                                                            <li><a class="item-name" href="{{ URL::to($child2->slug) }}">{{ $child2->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
									</ul>
								@endif
							</li>
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach
    </ul>
</aside>