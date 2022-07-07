<aside class="main-sidebar sidebar-dark-lightblue elevation-1">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link navbar-lightblue">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img id="sidebar-avatar" src="{{ asset(auth()->user()->avatar) }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile.index') }}" class="d-block" data-toggle="tooltip" title="Profile">Alexander
                    Pierce</a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child nav-flat nav-child-indent"
                data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header text-uppercase">Inventories</li>
                @can('inventory')
                    <li class="nav-item {{ request()->is('admin/inventories/*') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/inventories/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-universal-access"></i>
                            <p>
                                Inventories
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-stock')
                                <li class="nav-item">
                                    <a href="{{ route('admin.inventories.stocks.index') }}"
                                       class="nav-link {{ (request()->is('admin/inventories/stocks*')) ? 'active' : '' }}">
                                        <i class="fa-solid fa-warehouse nav-icon"></i>
                                        <p>Stock</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-report')
                                <li class="nav-item">
                                    <a href="{{ route('admin.inventories.reports.index') }}"
                                       class="nav-link {{ (request()->is('admin/inventories/reports*')) ? 'active' : '' }}">
                                        <i class="fa fa-line-chart nav-icon"></i>
                                        <p>Reports</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-header text-uppercase">settings</li>
                @can('configurations')
                    <li class="nav-item {{ request()->is('admin/configurations/*') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/configurations/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                Configurations
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-category')
                                <li class="nav-item">
                                    <a href="{{ route('admin.configurations.categories.index') }}"
                                       class="nav-link {{ (request()->is('admin/configurations/categories*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-product')
                                <li class="nav-item">
                                    <a href="{{ route('admin.configurations.products.index') }}"
                                       class="nav-link {{ (request()->is('admin/configurations/product*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-currency')
                                <li class="nav-item">
                                    <a href="{{ route('admin.configurations.currencies.index') }}"
                                       class="nav-link {{ (request()->is('admin/configurations/currencies*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Currencies</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-unit')
                                <li class="nav-item">
                                    <a href="{{ route('admin.configurations.units.index') }}"
                                       class="nav-link {{ (request()->is('admin/configurations/units*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Units</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-slot')
                                <li class="nav-item">
                                    <a href="{{ route('admin.configurations.slots.index') }}"
                                       class="nav-link {{ (request()->is('admin/configurations/slots*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Slots</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-supplier')
                                <li class="nav-item">
                                    <a href="{{ route('admin.configurations.suppliers.index') }}"
                                       class="nav-link {{ (request()->is('admin/configurations/suppliers*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Suppliers</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-header text-uppercase">Access</li>
                @can('access')
                    <li class="nav-item {{ request()->is('admin/assessments/*') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/assessments/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-universal-access"></i>
                            <p>
                                Assessments
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('list-user')
                                <li class="nav-item">
                                    <a href="{{ route('admin.assessments.users.index') }}"
                                       class="nav-link {{ (request()->is('admin/assessments/users*')) ? 'active' : '' }}">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-role')
                                <li class="nav-item">
                                    <a href="{{ route('admin.assessments.roles.index') }}"
                                       class="nav-link {{ (request()->is('admin/assessments/roles*')) ? 'active' : '' }}">
                                        <i class="fa fa-tasks nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-group-permission')
                                <li class="nav-item">
                                    <a href="{{ route('admin.assessments.group_permissions.index') }}"
                                       class="nav-link {{ (request()->is('admin/assessments/group_permissions*')) ? 'active' : '' }}">
                                        <i class="fa fa-object-group nav-icon"></i>
                                        <p>Group Permissions</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-permission')
                                <li class="nav-item">
                                    <a href="{{ route('admin.assessments.permissions.index') }}"
                                       class="nav-link {{ (request()->is('admin/assessments/permissions*')) ? 'active' : '' }}">
                                        <i class="fa fa-user-secret nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            </ul>
        </nav>
    </div>
</aside>
