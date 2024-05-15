<div class="side-mini-panel">
    <ul class="mini-nav">
        <div class="togglediv"><a href="javascript:void(0)" id="togglebtn"><i class="ti-menu"></i></a></div>
        <!-- .Dashboard -->
        <li>
            <a href="javascript:void(0)"><i class="ti-layout-grid2"></i></a>
            <div class="sidebarmenu">
                <!-- Left navbar-header -->
                <h3 class="menu-title">{{ __('file.dashboard') }}</h3>
                <ul class="sidebar-menu">
                    <li><a href="{{ route('backend.dashboard.prayertimes') }}">Prayer Times  </a></li>
                    <li><a href="{{ route('backend.subscriber.index') }}">Subscriber</a></li>
                    <li><a href="{{ route('backend.box.index') }}">Box</a></li>
                    <li><a href="{{ route('backend.song.index') }}">Song</a></li>
                </ul>
                <!-- Left navbar-header end -->
            </div>
        </li>
        <!-- /.Dashboard -->
         <!-- .User Management -->
         <li>
            <a href="javascript:void(0)"><i class="fa fa-users"></i></a>
            <div class="sidebarmenu">
                <!-- Left navbar-header -->
                <h3 class="menu-title">User Management</h3>
                <ul class="sidebar-menu">
                    <li><a href="{{ route('backend.roles.index') }}">Roles </a></li>
                    <li><a href="{{ route('backend.admins.index') }}">Admins</a></li>
                </ul>
                <!-- Left navbar-header end -->
            </div>
        </li>
        <!-- /.User Management -->
    </ul>
</div>
