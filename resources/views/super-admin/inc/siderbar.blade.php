<div data-active-color="black" data-background-color="white" data-image="" class="app-sidebar">
    <div class="sidebar-header">
        <div class="logo clearfix"><a href="{{route('user.dashboard')}}" class="logo-text float-right">
                <div class="logo-img"><img src="{{asset('admin/img/logo-galaxy.png')}}" alt="کلکول"/></div>
                <span class="text align-middle">کلکول</span></a><a id="sidebarToggle" href="javascript:;"
                                                                   class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i
                    data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;"
                                                                                  class="nav-close d-block d-md-block d-lg-none d-xl-none"><i
                    class="ft-circle"></i></a></div>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

                <li class="{{ request()->is('super-admin/dashboard') ? 'active' : '' }}  nav-item">
                    <a href="{{route('super-admin.dashboard')}}">
                        <i class="icon-home"></i><span data-i18n="" class="menu-title">داشبورد</span>
                    </a>
                </li>
                <li class="{{ request()->is('super-admin/users') ? 'active' : '' }}  nav-item">
                    <a href="{{route('super-admin.users')}}">
                        <i class="icon-user"></i><span data-i18n="" class="menu-title">کاربران</span>
                    </a>
                </li>


                <li class="has-sub nav-item {{ request()->is('super-admin/blogs/*') ? 'open' : '' }} ">
                    <a href="#"><i class="icon-book-open"></i><span data-i18n="" class="menu-title">بلاگ</span></a>
                    <ul class="menu-content">
                        <li class="{{ request()->is('super-admin/blogs') ? 'active' : '' }}"><a
                                href="{{route('super-admin.blogs.index')}}" class="menu-item">لیست بلاگ ها</a>
                        </li>
                        <li class="{{ request()->is('super-admin/blogs/create') ? 'active' : '' }}"><a
                                href="{{route('super-admin.blogs.create')}}" class="menu-item">بلاگ
                                جدید</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>

{{--@endif--}}
