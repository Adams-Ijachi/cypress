<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="{{ route('dashboard.activities') }}"  @class([
                        'active' => request()->routeIs('dashboard.activities'),
                        'nav-link'
                    ])>
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Activities

                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.users') }}"  @class([
                        'active' => request()->routeIs('dashboard.users'),
                        'nav-link'
                    ])>
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Users
                        </p>
                    </a>

                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
