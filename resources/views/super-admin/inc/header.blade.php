<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-right">
                <span class="sr-only">تغییر ناوبری </span>
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <span class="d-lg-none navbar-right navbar-collapse-toggle">
                <a class="open-navbar-container"><i class="ft-more-vertical"></i></a></span>
            <a id="navbar-fullscreen" href="javascript:;" class="ml-2 display-inline-block apptogglefullscreen"><i
                    class="ft-maximize blue-grey darken-4 toggleClass"></i>
                <p class="d-none">تمام صفحه</p></a>

        </div>
        <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav">

                    <li class="dropdown nav-item mr-0 ml-5"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-user-link dropdown-toggle">
                            <span  class="avatar avatar-online">
                                <img id="navbar-avatar" src="{{isset($userMeta) ? asset($userMeta->image) : asset('admin/img/portrait/small/avatar-s-3.jpg')}}" alt="avatar"/>
                                <span class="d-inline-block mr-3">{{auth()->user()->name}} عزیز</span>
                            </span>
                            <p class="d-none">تنظیمات کاربر</p></a>
                        <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-left">
                            <div class="arrow_box_right">

                                <a href="javascript:void(0)" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout').submit()"><i
                                            class="ft-power ml-2"></i><span>خروج</span></a>

                                <form id="logout" method="POST" action="{{ route('logout') }}">@csrf</form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
