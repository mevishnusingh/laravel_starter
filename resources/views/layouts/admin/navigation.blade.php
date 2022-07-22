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
                @can('view_merchants')
                    <a class="nav-link" href="{{ route('merchants.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Merchants
                    </a>
                @endcan
            </div>
        </div>

        <div class="sb-sidenav-footer">
            @role('Admin')
                <div>
                    <span class="small">
                        <button data-toggle="modal" data-target="#merchants" style="width: 100%" type="button"
                            class="btn btn-success">Merchants</button>
                    </span>
                </div>
            @endrole
        </div>
        <div class="sb-sidenav-footer">
            <span class="small">Logged in as:</span>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
