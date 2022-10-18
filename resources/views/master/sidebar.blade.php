<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WeMakers</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link {{Request::is('admin/dashboard') ? 'active': ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{Request::is('admin/view-category') || Request::is('admin/add-category') || Request::is('admin/edit-category/*') ? 'menu-open active': ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/view-category')}}" class="nav-link {{Request::is('admin/view-category') ? 'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/add-category')}}" class="nav-link {{Request::is('admin/add-category') ? 'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Request::is('admin/view-items') || Request::is('admin/add-items') || Request::is('admin/edit-item/*') ? 'menu-open active': ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Sub Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/view-items')}}" class="nav-link {{Request::is('admin/view-items') ? 'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Sub Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/add-items')}}" class="nav-link {{Request::is('admin/add-items') ? 'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Sub Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>