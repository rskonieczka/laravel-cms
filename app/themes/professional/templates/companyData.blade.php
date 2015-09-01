@extends('theme::layout.contactMobile')

@section('templateContact')
	<section class="contact-section">
		<div class="container-fluid">
			<h1>{{ trans('interface.home_contact_companydetails') }}</h1>
			<address class="contact-address">
				{{ renderText($category->texts, 'contactCompany', 'content') }}
			</address>
		</div>
	</section>
@stop