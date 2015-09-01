@extends('theme::layout.contactMobile')

@section('templateContact')
	<section class="contact-section">
		<div class="container-fluid">
			<h1>{{ trans('interface.home_contact_other') }}</h1>
		</div>
		<div class="container-fluid">
			<ul class="slide-list">
				<li class="active">
					<span class="name">{{ trans('interface.home_contact_researchlab') }}</span>
					<div class="slide-list-items" style="display: block;">
						{{ renderText($category->texts, 'contactLab', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">{{ trans('interface.home_contact_technolab') }}</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactLabtech', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">{{ trans('interface.home_contact_production') }}</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactProduction', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">{{ trans('interface.home_contact_promotion') }}</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactPromotion', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">{{ trans('interface.home_contact_personnel') }}</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactPersonnel', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">{{ trans('interface.home_contact_technical') }}</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactTechnical', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">{{ trans('interface.home_contact_finance') }}</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactFinancial', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">{{ trans('interface.home_contact_audit') }}</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactAudit', 'content') }}
					</div>
				</li>
				<li>
					<span class="name">{{ str_replace("<br />", " ", trans('interface.home_contact_director')) }}</span>
					<div class="slide-list-items">
						{{ renderText($category->texts, 'contactDirector', 'content') }}
					</div>
				</li>
			</ul>
		</div>
	</section>
@stop