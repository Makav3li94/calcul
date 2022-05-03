@if(auth()->check())
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

                        <li class="dropdown nav-item mt-1"><a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-bell blue-grey darken-4"></i><span class="notification badge badge-pill badge-danger">4</span>
                                <p class="d-none">اطلاعیه</p></a>
                            <div class="notification-dropdown dropdown-menu dropdown-menu-left">
                                <div class="arrow_box_right">
                                    <div class="noti-list"><a class="dropdown-item noti-container py-2"><i class="ft-share info float-right d-block font-medium-4 mt-2 ml-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 info">سفارش جدید دریافت شده</span><span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span></span></a><a class="dropdown-item noti-container py-2"><i class="ft-save warning float-right d-block font-medium-4 mt-2 ml-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 warning">کاربر جدید ثبت شده است</span><span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span></span></a><a class="dropdown-item noti-container py-2"><i class="ft-repeat danger float-right d-block font-medium-4 mt-2 ml-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 danger">سفارش جدید دریافت شده</span><span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span></span></a><a class="dropdown-item noti-container py-2"><i class="ft-shopping-cart success float-right d-block font-medium-4 mt-2 ml-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 success">مورد جدید در سبد خرید شما</span><span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span></span></a><a class="dropdown-item noti-container py-2"><i class="ft-heart info float-right d-block font-medium-4 mt-2 ml-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 info">فروش جدید</span><span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span></span></a><a class="dropdown-item noti-container py-2"><i class="ft-box warning float-right d-block font-medium-4 mt-2 ml-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 warning">سفارش تحویل داده شده</span><span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span></span></a></div><a class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1">خواندن همه اعلان ها</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item mt-1 d-none d-lg-block"><a id="navbar-notification-sidebar" href="javascript:;" class="nav-link position-relative notification-sidebar-toggle"><i class="icon-equalizer blue-grey darken-4"></i>
                                <p class="d-none">نوار اطلاع رسانی</p></a></li>
                        <li class="dropdown nav-item mr-0 ml-5"><a id="dropdownBasic3" href="#" data-toggle="dropdown"
                                                                   class="nav-link position-relative dropdown-user-link dropdown-toggle">
                            <span class="avatar avatar-online">
                                <img id="navbar-avatar"
                                     src="{{asset('admin/img/portrait/small/avatar-s-1.jpg')}}"
                                     alt="avatar"/>
                                <span class="d-inline-block mr-3">{{auth()->user()->name}} </span>
                            </span>
                                <p class="d-none">تنظیمات کاربر</p></a>
                            <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-left">
                                <div class="arrow_box_right">

                                    <a href="javascript:void(0)" class="dropdown-item"
                                       onclick="event.preventDefault();document.getElementById('logout').submit()"><i
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
@endif
