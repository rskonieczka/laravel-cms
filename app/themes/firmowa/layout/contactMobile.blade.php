@extends('theme::layout.master')

@section('template')
	<div id="content" class="contact-mobile">
		<div class="breadcrumb-bar">
			<div class="container-fluid">
				{{ $category->breadcrumbs }}
			</div>
		</div>
		@yield('templateContact')
	</div>
@stop