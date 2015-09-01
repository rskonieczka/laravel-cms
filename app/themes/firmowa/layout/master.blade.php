<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    @include('includes.head')
</head>
<body @if(App::getLocale() == 'ru') id="lang-ru" @endif>
	<header id="header">
		@include('includes.navbar')
	</header>
	<main id="main">
		@yield('template')
	</main>
	<footer>
		<div class="footer-nav">
			<div class="container-fluid">
				<ul class="social-links list-unstyled">
					<li><a href="https://www.youtube.com/user/NOVOLltd" class="icon-youtube"></a></li>
					<li><a href="https://www.facebook.com/novolPL" class="icon-facebook"></a></li>
					<li><a href="https://www.linkedin.com/company/novol-sp-z-o-o-" class="icon-linkedin"></a></li>
				</ul>
				<ul class="clearfix list-unstyled hidden-xs hidden-sm">
					@foreach ($category->navbar as $index => $item)
						<li class="@if ($item->slug == "/") hidden-xs hidden-sm @endif @if (count($item->childs) > 0) dropdown @endif">
							<a @if ($item->slug == '/#kontakt') id="kontakt-menu" @endif class="@if ($item->slug == "/") icon-home @elseif($item->slug !== trans('routes.footer_career')) scrollToEl @endif @if ($category->id == $item->id) active @endif" @if ($item->slug == '/#kontakt') data-slug="kontakt-mobile" @endif href="{{ getLink($item->slug) }}">
								@if ($item->slug != "/")<span class="text-link">{{ $item->name }}</span>@endif
							</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<address class="footer-address">
			<div class="container-fluid">
				<div class="row">
					<div class="row-md-height">
						<div class="col-md-6 col-md-height col-middle">
							<p>COPYRIGHT NOVOL SP. Z O.O. 2015</p>
							<p><a href="/files/polityka_cookies.pdf" class="link-policy" target="_blank">{{ trans('interface.master_privacy') }}</a></p>
						</div>
						<div class="col-md-6 col-md-height col-middle text-right">
							<div class="created-by">
								CREATED BY <a href="http://nekk.pl">NEKK</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</address>
	</footer>
	<section class="cookies-alert">
		<p>
			{{ trans('common.cookies_info') }}
		</p>
	</section>
	@include('includes.social')
	@yield('extrascripts')
</body>