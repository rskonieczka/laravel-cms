<!DOCTYPE html>
<html>
    <head>
    @include('includes.head')
    </head>
<body class="header-light navbar-light navbar-fixed with-topbar withAnimation">

<nav class="navbar yamm" role="navigation">
@include('includes.navbar')
</nav>

<div id="wrapper">

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

@yield('template')

</div>
@include('includes.scripts')
@yield('extrascripts')
</body>
</html>