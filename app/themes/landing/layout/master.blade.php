<!DOCTYPE html>
<html>
    <head>
    @include('includes.head')
    </head>
<body class="header-light navbar-light navbar-fixed with-topbar withAnimation">

<header class="hidden-xs">@include('includes.header')</header>

<div class="container"></div>

<nav class="navbar yamm" role="navigation">
@include('includes.navbar')
</nav>

<div class="container"></div>
<div class="container"></div>

<div id="wrapper">

<!-- VISIBLE COPY OF THE HEADER ONLY IN MOBILE NEEDED FOR THE SIDE MENU EFFECT -->

<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header visible-xs">
        <a class="navbar-brand" href="/">
        {{ HTML::image('front/images/content/logo.png', 'Law 4 growth') }}</a>
        <button type="button" class="navbar-toggle" id="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
</div>

<!-- END -->



@yield('template')

</div>
<section class="cookies-alert">
    <div class="cookies-inner">
        <a class="close">Zamknij</a>
        <h4>Ta strona korzysta z plików cookies</h4>
        <p>
            Korzystanie z witryny bez zmiany ustawień Twojej przeglądarki oznacza, że wyrażasz zgodę na ich wykorzystanie.<br />
            Aby uzyskać więcej informacji <a href="">kliknij tutaj</a>.
        </p>
    </div>
</section>
@include('includes.scripts')
@yield('extrascripts')
<!-- end scripts -->
</body>
</html>