@extends('theme::layout.contactMobile')

@section('templateContact')
	<section class="contact-section">
		<div class="container-fluid">
			<h1>{{ trans('interface.home_contact_marketing') }}</h1>
		</div>
		<div class="container-fluid">
			<ul class="slide-list">
				<li class="active">
					<span class="name">PROFESSIONAL</span>
					<div class="slide-list-items" style="display: block;">
						{{ renderText($category->texts, 'contactMark', 'content') }}
					</div>
				</li>
				@if (renderText($category->texts, 'contactMarkSpectral', 'content', true))
					<li>
						<span class="name">SPECTRAL</span>
						<div class="slide-list-items">
							{{ renderText($category->texts, 'contactMarkSpectral', 'content') }}
						</div>
					</li>
				@endif
				@if (renderText($category->texts, 'contactMarkIndustrial', 'content', true))
					<li>
						<span class="name">INDUSTRIAL</span>
						<div class="slide-list-items">
							{{ renderText($category->texts, 'contactMarkIndustrial', 'content') }}
						</div>
					</li>
				@endif
				@if (renderText($category->texts, 'contactMarkClassic', 'content', true))
					<li>
						<span class="name">NOVOL FOR Classic Car</span>
						<div class="slide-list-items">
							{{ renderText($category->texts, 'contactMarkClassic', 'content') }}
						</div>
					</li>
				@endif
				@if (renderText($category->texts, 'contactMarkFloor', 'content', true))
					<li>
						<span class="name">NOVOFLOOR</span>
						<div class="slide-list-items">
							{{ renderText($category->texts, 'contactMarkFloor', 'content') }}
						</div>
					</li>
				@endif
				@if (renderText($category->texts, 'contactMarkSupra', 'content', true))
					<li>
						<span class="name">SUPRA</span>
						<div class="slide-list-items">
							{{ renderText($category->texts, 'contactMarkSupra', 'content') }}
						</div>
					</li>
				@endif
				@if (renderText($category->texts, 'contactMarkNautic', 'content', true))
					<li>
						<span class="name">NAUTIC</span>
						<div class="slide-list-items">
							{{ renderText($category->texts, 'contactMarkNautic', 'content') }}
						</div>
					</li>
				@endif
				@if (renderText($category->texts, 'contactMarkUltra', 'content', true))
					<li>
						<span class="name">ULTRA LINE</span>
						<div class="slide-list-items">
							{{ renderText($category->texts, 'contactMarkUltra', 'content') }}
						</div>
					</li>
				@endif
			</ul>
		</div>
	</section>
@stop