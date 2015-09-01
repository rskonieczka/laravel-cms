@extends('theme::layout.contactMobile')

@section('templateContact')
	<section class="contact-section">
		<div class="container-fluid">
			<h1>{{ trans('interface.home_contact_marketing') }}</h1>
			<div class="contact-text">
				{{ renderText($category->texts, 'contactMark', 'content') }}
			</div>
		</div>
	</section>
@stop