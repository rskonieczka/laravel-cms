@extends('theme::layout.contactMobile')

@section('templateContact')
	<section class="contact-section">
		<div class="container-fluid">
			<h1>{{ trans('interface.home_contact_contactform') }}</h1>
			<article class="contact-mobile">
				{{ Form::open(array('url' => 'ajax/sendContactEmail', 'method' => 'post', 'id' => 'contact-form', 'novalidate' => 'novalidate')) }}
					<div class="form-default form-contact">
						<div class="form-group form-group-options">
							<label>{{ trans('interface.home_contact_who') }}</label>
							<select class="form-control" name="private_business">
								<option value="general">{{ trans('interface.home_contact_main') }}</option>
								<option value="sell">{{ trans('interface.home_contact_sale') }}</option>
								<option disabled>{{ trans('interface.home_contact_marketingdept') }}</option>
								<option value="car_varnishing">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans('interface.home_contact_carvarnishing')
								}}</option>
								<option value="industrial_varnishing">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans('interface.home_contact_indvarnishing') }}</option>
								<option value="renovation">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans('interface.home_contact_renovation') }}</option>
								<option value="building">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans('interface.home_contact_buildingmat') }}</option>
								<option value="boatbuilding">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ trans('interface.home_contact_boatbuilding') }}</option>
							</select>
						</div>
						<div class="form-group">
							<label for="input-user">{{ trans('interface.home_contact_name') }}</label>
							<input type="name" name="name" class="form-control" id="input-user" placeholder="{{ trans('interface.home_contact_nameex') }}">
						</div>
						<div class="form-group">
							<label for="input-email">{{ trans('interface.home_contact_email') }}</label>
							<input type="email" name="email" class="form-control" id="input-email" placeholder="{{ trans('interface.home_contact_emailex') }}">
						</div>
						<div class="form-group">
							<label for="input-text">{{ trans('interface.home_contact_message') }}</label>
							<textarea class="form-control" name="content" id="input-text" placeholder="{{ trans('interface.home_contact_messageex') }}"></textarea>
						</div>
						<div class="df_line">
							<div class="df_checkbox">
								<input value="private" id="checkbox-option-8" type="checkbox" name="send_copy">
								<label for="checkbox-option-8"></label>
							</div>
							<label for="checkbox-option-8">
								{{ trans('interface.home_contact_sendmeacopy') }}
							</label>
						</div>
						<div class="clearfix submit-button">
							<button type="submit" class="btn btn-default pull-right">{{ trans('interface.home_contact_send') }}</button>
						</div>
					</div>
				{{ Form::close() }}
			</article>
		</div>
	</section>
    @include('theme::templates.sections.common.rewards')
@stop