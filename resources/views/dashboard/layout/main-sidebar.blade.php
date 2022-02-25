
@php
if (!isset($user)){
    $user=\Illuminate\Support\Facades\Auth::user();
}
@endphp
<style>
    .menu_icon_for_currency{
        width: 18px;
        filter: grayscale(1);
    }

    .pos_top_5{
        position: relative;
        top: -5px;
    }

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.13/vue.min.js" integrity="sha512-QEg3HPGHrXZsoRu8Oi91QR2ikOCNPQtsDcPT/Q8H8akobM0KzqzjCMpM4jFffFB8p7Mx1IblPM48Fy3t4VU+zQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active"><img src="/assets/image/logo.png" class="main-logo" alt="لوگو"></a>
        <a class="desktop-logo logo-dark active" ><img src="/assets/image/logo.png" class="main-logo dark-theme" alt="لوگو"></a>
        <a class="logo-icon mobile-logo icon-light active" ><img src="/assets/image/favicon.png" class="logo-icon" alt="لوگو"></a>
        <a class="logo-icon mobile-logo icon-dark active" ><img src="/assets/image/favicon.png" class="logo-icon dark-theme" alt="لوگو"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" style="object-fit: cover" class="avatar avatar-xl brround" src="/assets/image/avatar-profile.jpg"><span class="avatar-status profile-status bg-green"></span>
                </div>
                <a href="{{route("dashboard.profile")}}" class="user-info d-block">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{\Illuminate\Support\Facades\Auth::user()->name??null}}</h4>
                    <span class="mb-0 text-muted">{{\Illuminate\Support\Facades\Auth::user()->roles()->first()->name??null}}</span>
                </a>
            </div>
        </div>
        <ul class="side-menu">




            @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.reports.course"))

            <li class="slide">
                <a href="#" class="side-menu__item" data-toggle="slide" >


                    <i class="mdi mdi-bank side-menu__icon pos_top_5"></i>
                    <span class="side-menu__label">گزارشات مالی</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route("dashboard.reports.course")}}"> گزارشات فروش درس ها</a></li>
                    <li><a class="slide-item" href="{{route("dashboard.reports.packages")}}">
                            گزارشات فروش تربیت متخصص
                              </a></li>

                </ul>

            </li>

            @endif






                @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.course.all"))
                    <li class="slide">
                        <a href="#" class="side-menu__item" data-toggle="slide" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg>                    <span class="side-menu__label"> درس ها </span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route("dashboard.course.all")}}"> تمام درس های خریداری شده</a></li>
                            <li><a class="slide-item" href="{{route("dashboard.package.all")}}">لیست دوره تربیت متخصص</a></li>

                        </ul>
                    </li>
               @endif

                @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.students.all"))
                    <li class="slide">
                        <a href="#" class="side-menu__item" data-toggle="slide" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 512 512"><path d="M402 168c-2.93 40.67-33.1 72-66 72s-63.12-31.32-66-72c-3-42.31 26.37-72 66-72s69 30.46 66 72z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M336 304c-65.17 0-127.84 32.37-143.54 95.41-2.08 8.34 3.15 16.59 11.72 16.59h263.65c8.57 0 13.77-8.25 11.72-16.59C463.85 335.36 401.18 304 336 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path d="M200 185.94c-2.34 32.48-26.72 58.06-53 58.06s-50.7-25.57-53-58.06C91.61 152.15 115.34 128 147 128s55.39 24.77 53 57.94z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M206 306c-18.05-8.27-37.93-11.45-59-11.45-52 0-102.1 25.85-114.65 76.2-1.65 6.66 2.53 13.25 9.37 13.25H154" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/></svg>
                            <span class="side-menu__label">  دانشجویان  </span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route("dashboard.students.all")}}"> خریداران درس</a></li>

                        </ul>
                    </li>
                @endif



                @if(
                 \App\helper\helper::check_user_have_permission_to_route_name("dashboard.reports.certificate") or
                 \App\helper\helper::check_user_have_permission_to_route_name("dashboard.reports.certificate.create")
                    )
            <li class="slide">
                <a href="#" class="side-menu__item" data-toggle="slide" >
                    <i class="mdi mdi-certificate side-menu__icon pos_top_5"></i>
                    <span class="side-menu__label"> سرتیفیکیت</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.reports.certificate"))
                    <li><a class="slide-item" href="{{route("dashboard.reports.certificate")}}">لیست </a></li>
                    @endif
                    @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.reports.certificate.create"))
                    <li><a class="slide-item" href="{{route("dashboard.reports.certificate.create")}}"> ایجاد </a></li>
                    @endif

                </ul>

            </li>
                @endif


                @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.users.all")
                or \App\helper\helper::check_user_have_permission_to_route_name("dashboard.users.create")
                )
            <li class="slide">
                <a href="#" class="side-menu__item" data-toggle="slide" >
                    <i class="mdi mdi-account-settings side-menu__icon pos_top_5"></i>
                    <span class="side-menu__label"> کاربران</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                   @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.users.all"))
                    <li><a class="slide-item" href="{{route("dashboard.users.all")}}">لیست کاربران </a></li>
                    @endif
                    @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.users.create"))
                    <li><a class="slide-item" href="{{route("dashboard.users.create")}}"> ایجاد </a></li>
                       @endif

                </ul>

            </li>

                @endif

                @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.role.all") ||
                \App\helper\helper::check_user_have_permission_to_route_name("dashboard.role.create"))
                    <li class="slide">
                        <a href="#" class="side-menu__item" data-toggle="slide" >
                            <i class="mdi mdi-account-edit side-menu__icon pos_top_5"></i>
                            <span class="side-menu__label"> نقش ها</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.role.all"))
                                <li><a class="slide-item" href="{{route("dashboard.role.all")}}">لیست نقش ها </a></li>
                            @endif
                            @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.role.create"))
                                <li><a class="slide-item" href="{{route("dashboard.role.create")}}"> ایجاد نقش </a></li>
                           @endif
                        </ul>
                    </li>
                @endif



                @if(\App\helper\helper::check_user_have_permission_to_route_name("dashboard.reports.from.list"))
            <li class="slide">
                <a href="#" class="side-menu__item" data-toggle="slide" >
                    <i class="mdi mdi-book-variant side-menu__icon pos_top_5"></i>
                    <span class="side-menu__label"> فرم ها</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route("dashboard.reports.from.list","درخواست دوره خصوصی")}}">درخواست دوره خصوصی	 </a></li>
                    <li><a class="slide-item" href="{{route("dashboard.reports.from.list","فرم تقاضای کارآموزی و استخدام")}}"> تقاضای کارآموزی و استخدام</a></li>
                    <li><a class="slide-item" href="{{route("dashboard.reports.from.list","درخواست همکاری اساتید")}}">درخواست همکاری اساتید </a></li>
                    <li><a class="slide-item" href="{{route("dashboard.reports.from.list","درخواست دوره آموزشی (ویژه سازمانها)")}}">درخواست دوره (ویژه سازمانها)	</a></li>

                </ul>

            </li>
             @endif

        </ul>
    </div>
</aside>
