<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        @foreach ($sidebarMenu as $group => $childs)
        <li class="treeview">
            <a href="#">
            @if($group == 'content') <i class="fa fa-align-justify"></i>  @endif
            @if($group == 'people') <i class="fa fa-users"></i>  @endif
            @if($group == 'media') <i class="fa fa-file-image-o"></i>  @endif
            @if($group == 'settings') <i class="fa fa-cogs"></i>  @endif
            <span>{{ Lang::get('admin/includes/sidebar.menu_'.$group) }}</span><i class="fa fa-angle-left pull-right"></i></a>
            @if (is_array($childs))
                <ul class="treeview-menu">
                    @foreach ($childs as $route => $name)
                        <li>
                            <a href="{{ URL::route($route) }}">
                                <span>{{ $name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
        @endforeach
    </ul>
</section>
<!-- /.sidebar -->