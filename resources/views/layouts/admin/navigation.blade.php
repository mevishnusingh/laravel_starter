<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @can('view_users')
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Users
                    </a>
                @endcan
                @can('view_roles')
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Roles
                    </a>
                @endcan
                @can('view_permissions')
                    <a class="nav-link" href="{{ route('permissions.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Permissions
                    </a>
                @endcan
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <span class="small">Logged in as:</span>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
