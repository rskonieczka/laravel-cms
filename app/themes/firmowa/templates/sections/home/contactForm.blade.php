{{ Form::open(array('url' => 'ajax/sendContactEmail', 'method' => 'post', 'id' => 'contact-form', 'novalidate' => 'novalidate')) }}
	<div class="row">
		<div class="col-md-6">
			<h4>{{ trans('interface.home_contact_who') }}</h4>
			<ul id="privateBusiness" class="contact__options list-unstyled">
				<li>
					<div class="df_line">
						<div class="df_radio">
							<input value="general" id="checkbox-option-1" name="private_business" type="radio">
							<label for="checkbox-option-1"></label>
						</div>
						<label for="checkbox-option-1">
							{{ trans('interface.home_contact_main') }}
						</label>
					</div>
				</li>
				<li>
					<div class="df_line">
						<div class="df_radio">
							<input value="sell" id="checkbox-option-2" name="private_business" type="radio">
							<label for="checkbox-option-2"></label>
						</div>
						<label for="checkbox-option-2">
							{{ trans('interface.home_contact_sale') }}
						</label>
					</div>
				</li>
			</ul>
			<h6>{{ trans('interface.home_contact_marketingdept') }}</h6>
			<ul class="contact__options list-unstyled">
				<li>
					<div class="df_line">
						<div class="df_radio">
							<input value="car_varnishing" id="checkbox-option-3" name="private_business" type="radio">
							<label for="checkbox-option-3"></label>
						</div>
						<label for="checkbox-option-3">
							{{ trans('interface.home_contact_carvarnishing') }}
						</label>
					</div>
				</li>
				<li>
					<div class="df_line">
						<div class="df_radio">
							<input value="industrial_varnishing" id="checkbox-option-4" name="private_business" type="radio">
							<label for="checkbox-option-4"></label>
						</div>
						<label for="checkbox-option-4">
							{{ trans('interface.home_contact_indvarnishing') }}
						</label>
					</div>
				</li>
				<li>
					<div class="df_line">
						<div class="df_radio">
							<input value="renovation" id="checkbox-option-5" name="private_business" type="radio">
							<label for="checkbox-option-5"></label>
						</div>
						<label for="checkbox-option-5">
							{{ trans('interface.home_contact_renovation') }}
						</label>
					</div>
				</li>
				<li>
					<div class="df_line">
						<div class="df_radio">
							<input value="building" id="checkbox-option-6" name="private_business" type="radio">
							<label for="checkbox-option-6"></label>
						</div>
						<label for="checkbox-option-6">
							{{ trans('interface.home_contact_buildingmat') }}
						</label>
					</div>
				</li>
				<li>
					<div class="df_line">
						<div class="df_radio">
							<input value="boatbuilding" id="checkbox-option-7" name="private_business" type="radio">
							<label for="checkbox-option-7"></label>
						</div>
						<label for="checkbox-option-7">
							{{ trans('interface.home_contact_boatbuilding') }}
						</label>
					</div>
				</li>
			</ul>
		</div>
		<div class="col-md-6">
			<div class="form-default form-contact">
				<div class="form-group">
					<label for="input-user">{{ trans('interface.home_contact_name') }}</label>
					<input type="text" class="form-control" id="input-user" name="name" placeholder="{{ trans('interface.home_contact_nameex') }}">
				</div>
				<div class="form-group">
					<label for="input-email">{{ trans('interface.home_contact_email') }}</label>
					<input type="email" class="form-control" id="input-email" name="email" placeholder="{{ trans('interface.home_contact_emailex') }}">
				</div>
				<div class="form-group">
					<label for="input-text">{{ trans('interface.home_contact_message') }}</label>
					<textarea class="form-control" id="input-text" name="content" placeholder="{{ trans('interface.home_contact_messageex') }}"></textarea>
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
		</div>
	</div>
{{ Form::close() }}