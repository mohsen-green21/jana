<!-- ========== Left Sidebar Start ========== -->
<style>
    *{

    }
</style>
<div class="left-side-menu bg-danger">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="text-white">

            <ul class="metismenu" id="side-menu">
                <li class="menu-title text-white">داشبورد</li>
                <li>
                    <a href="{{ url('/') }}" class="disabled">
                        <i class="fad fa-tachometer-slow text-white"></i>
                        <span  class="text-white"> داشبورد </span>
                    </a>

                </li>

                <li class="text-white menu-title ">مدیریت آهنگ ها</li>


                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-cassette-tape text-white"></i>
                        <span class="text-white"> ژانر ها </span>
                        <span class="menu-arrow text-white"></span>
                    </a>
                    <ul class="nav-second-level bg-pink" aria-expanded="false">
                        <li >
                            <a class="text-white  " href="{{ url('/genre/create/') }}"> افزودن ژانر </a>
                        </li>
                        <li>
                            <a href="{{ url('/genre/')  }}" class="text-white">همه ژانرها </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fad fa-album-collection text-white"></i>
                        <span class="text-white"> آلبوم ها </span>
                        <span class="menu-arrow text-white"></span>
                    </a>
                    <ul class="nav-second-level bg-pink" aria-expanded="false">
                        <li>
                            <a href="{{ url('/album/create') }}" class="text-white"> افزودن آلبوم</a>
                        </li>
                        <li>
                            <a href="{{ url('/album') }}" class="text-white">همه آلبوم ها</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fad fa-user-music text-white"></i>
                        <span class="text-white"> هنرمندان </span>
                        <span class="menu-arrow text-white"></span>
                    </a>
                    <ul class="nav-second-level bg-pink" aria-expanded="false">

                        <li>
                            <a href="{{url('/artist/create')}}" class="text-white">افزودن هنرمند</a>
                        </li>
                        <li>
                            <a href="{{ url('artist/')}}" class="text-white">همه هنرمندان</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-music text-white"></i>
                        <span class="text-white"> آهنگ ها </span>
                        <span class="menu-arrow text-white"></span>
                    </a>
                    <ul class="nav-second-level bg-pink" aria-expanded="false">

                        <li>
                            <a href="{{url('/music/create')}}" class="text-white"> افزودن آهنگ </a>
                        </li>
                        <li>
                            <a href="{{url('/music')}}"  class="text-white"> همه آهنگ ها </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-list-music text-white"></i>
                        <span class="text-white"> پلی لیست ها </span>
                        <span class="menu-arrow text-white"></span>
                    </a>

                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-music text-white"></i>
                        <span class="text-white"> کانال ها </span>
                        <span class="menu-arrow text-white"></span>
                    </a>
                    <ul class="nav-second-level bg-pink" aria-expanded="false">
                        <li>
                            <a href="{{ url('/channel/create') }}" class="text-white"> افزودن کانال </a>
                        </li>
                        <li>
                            <a href="{{ url('/channel') }}" class="text-white"> همه کانال ها </a>
                        </li>


                    </ul>
                </li>


                <li class="menu-title text-white">مدیریت کاربران</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-user-tie text-white"></i>
                        <span class="text-white"> مدیران </span>
                        <span class="menu-arrow text-white"></span>
                    </a>

                    <ul class="nav-second-level bg-pink" aria-expanded="false">
                        <li>
                            <a href="{{url('admin/create')}}" class="text-white"> افزودن مدیر</a>
                        </li>
                        <li>
                            <a href="{{url('admin/')}}"  class="text-white"> مدیران </a>
                        </li>
                    </ul>
                </li>






                <li class="menu-title text-white">ابزارها</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-chart-area text-white"></i>
                        <span class="text-white"> اسلایدر </span>
                        <span class="menu-arrow text-white"></span>
                    </a>

                    <ul class="nav-second-level bg-pink" aria-expanded="false">
                        <li>
                        <a href="{{url('slider/create')}}" class="text-white">افزودن اسلایدر</a>
                        </li>
                        <li>
                            <a href="{{ url('slider/') }}" class="text-white"> اسلایدرها </a>
                        </li>
                    </ul>
                </li>







                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
