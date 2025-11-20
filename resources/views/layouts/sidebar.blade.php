<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- Brand -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 120 120">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15" />
                    </g>
                </svg>
            </a>
        </div>

        <!-- Dashboard -->
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('dashboard.admin') }}"><span
                                class="ml-1 item-text">Master Dashboard</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- User & Roles -->
        <p class="text-muted nav-heading mt-4 mb-1"><span>Master Data</span></p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#masterRoles" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Roles & Users</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="masterRoles">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.users.index') }}"><span
                                class="ml-1 item-text">Users</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.roles.index') }}"><span
                                class="ml-1 item-text">Roles</span></a>
                    </li>
                    <!-- Chatbot -->
                    <li class="nav-item">
                        <a class="nav-link pl-3 {{ request()->routeIs('admin.chat.*') ? 'active' : '' }}"
                            href="{{ route('admin.chat.index') }}">
                            <i class="fas fa-robot me-2"></i>
                            <span class="item-text">Chatbot</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Modules -->
        <p class="text-muted nav-heading mt-4 mb-1"><span>Product Utama</span></p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#modules" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i>
                    <span class="ml-3 item-text">Master</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="modules">
                    <li class="nav-item">
                        <a class="nav-link pl-3 {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
                            href="{{ route('admin.products.index') }}">
                            <i class="fas fa-boxes me-2"></i>
                            <span class="item-text">Products </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3 {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
                            href="{{ route('admin.products.index') }}">
                            <i class="fas fa-cubes me-2"></i>
                            <span class="item-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3 {{ request()->routeIs('admin.stocks.*') ? 'active' : '' }}"
                            href="{{ route('admin.stocks.index') }}">
                            <i class="fas fa-warehouse me-2"></i>
                            <span class="item-text">Stocks</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        <!-- Activity Logs -->
        <p class="text-muted nav-heading mt-4 mb-1"><span>Logs</span></p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
                <a class="nav-link pl-3" href="#">
                    <i class="fe fe-clock fe-16"></i>
                    <span class="ml-3 item-text">Activity Logs</span>
                </a>
            </li>
        </ul>

        <div class="btn-box w-100 mt-4 mb-1">
            <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269"
                target="_blank" class="btn mb-2 btn-primary btn-lg btn-block"><span class="small">Test Web & IT</span>
            </a>
        </div>
    </nav>
</aside>
