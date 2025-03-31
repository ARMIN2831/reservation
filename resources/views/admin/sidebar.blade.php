<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset("IMG_4409.jpeg") }}" alt="ل" class="brand-image img-circle elevation-3"
             style="opacity: .8;width: 35px">
        <span class="brand-text font-weight-light">مدیریت سامانه</span>
    </a>

    <div class="sidebar">
        <div>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('IMG_4409.jpeg') }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>داشبورد</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/dashboard/financial') }}" class="nav-link {{ (request()->is('admin/dashboard/financial')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>فاکتور ها</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview  {{ (request()->is('admin/dashboard/hotels')) ? 'menu-open' : '' }} {{ (request()->is('admin/dashboard/hotels/create')) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ (request()->is('admin/dashboard/hotels')) ? 'active' : '' }} {{ (request()->is('admin/dashboard/hotels/create')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                هتل ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/dashboard/hotels/create') }}" class="nav-link {{ (request()->is('admin/dashboard/hotels/create')) ? 'active' : '' }}">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>ساخت هتل</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/dashboard/hotels/') }}" class="nav-link {{ (request()->is('admin/dashboard/hotels')) ? 'active' : '' }}">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    <p>لیست هتل ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview  {{ (request()->is('admin/dashboard/users')) ? 'menu-open' : '' }} {{ (request()->is('admin/dashboard/users/create')) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ (request()->is('admin/dashboard/users')) ? 'active' : '' }} {{ (request()->is('admin/dashboard/users/create')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                کاربر ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/dashboard/users/create') }}" class="nav-link {{ (request()->is('admin/dashboard/users/create')) ? 'active' : '' }}">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>ساخت کاربر</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/dashboard/users/') }}" class="nav-link {{ (request()->is('admin/dashboard/users')) ? 'active' : '' }}">
                                    <i class="fas fa-list-ul nav-icon"></i>
                                    <p>لیست کاربر ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--<li class="nav-item">
                        <a href="{{ url('/dashboard/students') }}" class="nav-link {{ (request()->is('dashboard/students')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>دانشجوها</p>
                        </a>
                    </li>--}}
                </ul>
            </nav>
        </div>
    </div>
</aside>
