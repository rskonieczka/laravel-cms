<a href="/admin/dashboard/view" class="logo">
    <!-- Add the class icon to your logo image or logo icon to add the margining -->
    WebCMS
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>{{ ucfirst($activeUser->first_name) }} {{ ucfirst($activeUser->last_name) }} <small>({{ $activeUser->email }})</small> <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::route('admin.user.edit', array('id' => $activeUser->id)) }}">Mój profil</a></li>
                                    <li><a href="{{ URL::route('auth.logout') }}">Wyloguj</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
</nav>