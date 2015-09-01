<!DOCTYPE html>
<html>
	<head>
		@include('includes.head')
	</head>
<body class="{{ App::getLocale() }}">
	@include('includes.navbar')
	@yield('template')
	@include('includes.footer')
	@include('includes.scripts')
	<section class="cookies-alert">
		<p>
			{{ trans('common.cookies_info') }}
		</p>
	</section>
	@yield('extrascripts')
</body>
</html>
