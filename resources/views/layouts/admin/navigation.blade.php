<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Users
                </a>
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Roles
                </a>
                <a class="nav-link" href="{{ route('permissions.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Permissions
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <span class="small">Logged in as:</span>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
