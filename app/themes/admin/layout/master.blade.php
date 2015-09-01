<!DOCTYPE html>
<html>
    <head>
    @include('includes.head')
    </head>
    <body class="skin-black">
        <header class="header">
        @include('includes.header')
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                @include('includes.sidebar')
            </aside>
            @yield('content')
        </div>
        @include('includes.scripts')
        @yield('extrascripts')
        @yield('extrascripts2')
    </body>
</html>