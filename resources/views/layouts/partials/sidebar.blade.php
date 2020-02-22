<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light mt-5">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ auth()->user()->dashboardLink }}">
                            <i class="fa fa-fw fa-rocket"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
                            <i class="fa fa-fw fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
