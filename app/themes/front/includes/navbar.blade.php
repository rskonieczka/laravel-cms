<div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header hidden-xs">
            <a class="navbar-brand" href="/">
            Project name
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse no-transition" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" style="margin-right: -30px;">
                @foreach ($category->navbar as $index => $item)
                <li class="@if (isset($item->active)) active @endif @if (!empty($item->childs)) dropdown @endif ">
                <a @if (count($item->childs) > 0) class="dropdown-toggle" @endif href="{{ URL::to($item->slug) }}">
                    {{ $item->name }} @if (count($item->childs) > 0) <i class="fa fa-fw fa-angle-down"></i> @endif
                </a>
                @if (count($item->childs) > 0)
                <ul class="dropdown-menu yamm-dropdown">
                @foreach ($item->childs as $child)

                        <li><a href="{{ URL::to($item->slug.$child->slug) }}"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;{{ $child->name }}</a></li>

                @endforeach
                </ul>
                @endif
                </li>
                @endforeach
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->