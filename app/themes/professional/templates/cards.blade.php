@extends('theme::layout.master')

@section('template')
    <div id="content">
        <div class="container-fluid">
            @include('theme::includes.breadcrumbs')
            @include('theme::includes.cardssidebar')
            <div id="main-content">
                <article class="text-content">
                    <h1>{{ $docsCategory->name }}</h1>
                    <table class="cards-table" align="left" border="1" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">&nbsp;</th>
                            <th scope="col">{{ trans('interface.cards_technical') }}</th>
                            <th scope="col">{{ trans('interface.cards_other') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td class="text-center">@if(!empty($product->tech_card)) <a href="{{ URL::to('karty/tech/'.$product->tech_card) }}" class="icon-download" target="_blank"></a> @endif</td>
                            <td class="text-center">
								@if (!empty($product->char_card) || count($product->media) > 0 || count($product->media) > 0)
									<div class="dropdown cards-dropdown">
										<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu{{ $product->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											<span class="icon-download"></span>
											<span>{{ trans('interface.cards_choose') }}</span>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $product->id }}">
											@if (!empty($product->char_card))
												<li><a href="{{ URL::to('karty/bezp/'.$langPrefix.$product->char_card) }}" target="_blank">{{ trans('interface.cards_characteristics') }}</a></li>
											@endif
											@foreach ($product->ghs as $key => $ghs)
												<li><a href="{{ URL::to('uploads/media/'.$ghs->realname) }}" target="_blank">{{ trans('interface.cards_clp') }}</a></li>
											@endforeach
											@foreach ($product->media as $media)
												<li><a href="{{ URL::to('uploads/media/'.$media->realname) }}" target="_blank">@if (empty($media->name)) {{ $media->realname }} @else {{ $media->name }} @endif</a></li>
											@endforeach
										</ul>
									</div>
								@endif
							</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
					
					@if (count($products) > 0)
						<ul class="card-list">
							@foreach($products as $product)
								@if (count($product->ghs) > 0 || count($product->media) > 0 || !empty($product->tech_card) || !empty($product->char_card))
									<li>
										<span class="name">{{ $product->name }}</span>
										<div class="cards">
											@if (!empty($product->tech_card))
												<div class="card">
													<span class="card-label">{{ trans('interface.cards_technical') }}</span>
													<a href="{{ renderCardLink('karty/tech/', $product->tech_card, $langPrefix) }}" target="_blank" class="icon-download"></a>
												</div>
											@endif
											@if (!empty($product->char_card)) 
												<div class="card">
													<span class="card-label">{{ trans('interface.cards_characteristics') }}</span>
													<a href="{{ renderCardLink('karty/bezp/', $product->char_card, $langPrefix) }}" target="_blank" class="icon-download"></a>
												</div>
											@endif
											@foreach ($product->ghs as $key => $ghs)
												<div class="card">
													<span class="card-label">{{ trans('interface.cards_clp') }}</span>
													<a href="{{ URL::to('uploads/media/'.$ghs->realname) }}" target="_blank" class="icon-download"></a>
												</div>
											@endforeach
											@foreach ($product->media as $media)
												<div class="card">
													<span class="card-label">@if (empty($media->name)) {{ $media->realname }} @else {{ $media->name }} @endif</span>
													<a href="{{ imgAsset('professional', 'product_params/'.$media->realname) }}" target="_blank" class="icon-download"></a>
												</div>
											@endforeach
										</div>
									</li>
								@endif
							@endforeach
						</ul>
					@endif
                </article>
            </div>
        </div>
    </div>
@stop