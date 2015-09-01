@extends('theme::layout.contactMobile')

@section('templateContact')
	<section class="contact-section">
		<div class="container-fluid">
			<h1>{{ trans('interface.home_contact_sale')}}</h1>
		</div>
		<div class="contact-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactSale', 'content') }}
					</div>
				</div>
			</div>
			<!--<div class="container-fluid">
				<h2>Promocja</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactPromotion', 'content') }}
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<h2>Laboratorium badawczo-rozwojowe</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactLab', 'content') }}
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<h2>Laboratorium technologiczne</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactLabtech', 'content') }}
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<h2>Produkcja</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactProduction', 'content') }}
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<h2>Kadry</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactPersonnel', 'content') }}
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<h2>Dział techniczny</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactTechnical', 'content') }}
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<h2>Dział finansowy</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactFinancial', 'content') }}
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<h2>Audyt wewnętrzny</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactAudit', 'content') }}
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<h2>Dyrektor ds. systemów zarządzania</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactDirector', 'content') }}
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<h2>Zarząd</h2>
				<div class="row">
					<div class="col-md-12">
						{{ renderText($category->texts, 'contactBoard', 'content') }}
					</div>
				</div>
			</div>-->
		</div>
	</section>
@stop