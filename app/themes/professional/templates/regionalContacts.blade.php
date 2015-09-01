@extends('theme::layout.contactMobile')

@section('templateContact')
	<section class="contact-section">
		<div class="container-fluid">
			<h1>{{ trans('interface.home_contact_rh') }}</h1>
			<div class="contact-text">
				{{ renderText($category->texts, 'contactPr', 'content') }}
			</div>
		</div>
	</section>
@stop