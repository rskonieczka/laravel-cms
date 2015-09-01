@extends('theme::layout.contactMobile')

@section('templateContact')
	<section class="contact-section">
		<div class="container-fluid">
			<h1>{{ trans('interface.home_contact_rh') }}</h1>
		</div>
		<div class="container-fluid">
			<ul class="slide-list">
				<li class="active">
					<span class="name">PROFESSIONAL/SPECTRAL/ULTRA</span>
					<div class="slide-list-items" style="display: block;">
						{{ renderText($category->texts, 'contactPr', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">NOVOL FOR Classic Car</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactPrClassic', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">NOVOFLOOR</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactPrFloor', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">NAUTIC</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactPrNautic', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">SUPRA</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactPrSupra', 'content') }}
					</div>
				</li>
			</ul>
		</div>
	</section>
@stop