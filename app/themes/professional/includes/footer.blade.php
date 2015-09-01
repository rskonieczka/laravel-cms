<footer id="footer">
	<div class="footer-nav">
		<div class="container-fluid">
			<ul class="footer-menu list-unstyled">
				@foreach ($category->navbar as $index => $item)
					<li><a @if(strpos($item->slug, "#") !== false) class="scroll-to" data-scroll="{{ $item->slug }}" @endif href="{{ URL::to($item->slug) }}">{{ $item->name }}</a></li>
				@endforeach
			</ul>
			<ul class="social-links list-unstyled">
				<li><a href="https://www.youtube.com/user/NOVOLltd" class="icon-youtube"></a></li>
				<li><a href="https://www.facebook.com/novolPL" class="icon-facebook"></a></li>
				<li><a href="https://www.linkedin.com/company/novol-sp-z-o-o-" class="icon-linkedin"></a></li>
			</ul>
		</div>
	</div>
	<address class="footer-address">
		<div class="container-fluid">
			<div class="copy">
				<p>COPYRIGHT NOVOL SP. Z O.O. 2015</p>
				<p><a class="link-policy" href="/files/polityka_cookies.pdf" target="_blank">Polityka prywatności</a></p>
			</div>
			<div class="created-by">
				CREATED BY <a href="http://nekk.pl">NEKK</a>
			</div>
		</div>
	</address>
</footer>
@include('includes.social')
<div id="shadow"></div>