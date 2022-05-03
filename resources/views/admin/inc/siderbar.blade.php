        <div data-active-color="black" data-background-color="white" data-image="" class="app-sidebar">
            <div class="sidebar-header">
                <div class="logo clearfix"><a href="{{route('user.dashboard')}}" class="logo-text float-right">
                        <div class="logo-img"><img src="{{asset('admin/img/logo-galaxy.png')}}" alt="کلکول"/></div><span class="text align-middle">کلکول</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a></div>
            </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                        <li class="{{ request()->is('user/dashboard') ? 'active' : '' }}  nav-item">
                            <a href="{{route('user.dashboard')}}">
                                <i class="icon-home"></i><span data-i18n="" class="menu-title">داشبورد</span>
                            </a>
                        </li>

                    <li class="{{ request()->is('user/invest') ? 'active' : '' }}  nav-item">
                        <a href="{{route('user.invest')}}">
                            <i class="icon-target"></i><span data-i18n="" class="menu-title">سرمایه گذاری جدید</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('user/profile') ? 'active' : '' }}  nav-item">
                        <a href="{{route('user.profile')}}">
                            <i class="icon-user"></i><span data-i18n="" class="menu-title">پروفایل کاربری</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-background"></div>
    </div>

