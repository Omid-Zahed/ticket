<?php

use \Illuminate\Support\Facades\Auth;

?>
@php
if (!isset($user)){
    $user=\Illuminate\Support\Facades\Auth::user();
}
@endphp
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="index.html"><img src="/admin/valex/assets/img/brand/logo.png" class="main-logo" alt="لوگو"></a>
        <a class="desktop-logo logo-dark active" href="index.html"><img src="/admin/valex/assets/img/brand/logo-white.png" class="main-logo dark-theme" alt="لوگو"></a>
        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="/admin/valex/assets/img/brand/favicon.png" class="logo-icon" alt="لوگو"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="/admin/valex/assets/img/brand/favicon-white.png" class="logo-icon dark-theme" alt="لوگو"></a>
    </div>
    <div class="main-sidemenu">
        @if($user->getRoleName()!=\App\Models\User::$ROLE_USER)
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="/admin/valex/assets/image-used/avatar.png"><span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">
                        {{\Illuminate\Support\Facades\Auth::user()->UserIdentificationCard_valid->first_name}}
                    </h4>
                    <span class="mb-0 text-muted">مدیریت</span>
                </div>
            </div>
        </div>
        @endif
        <ul class="side-menu">
            @if($user->getRoleName()==\App\Models\User::$ROLE_USER)
                @php
                    $verifyUrl=$user->getVerifyUrl();
                @endphp
            <li class="slide">
                <a class="side-menu__item" href="{{$verifyUrl[0]??""}}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"></path><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"></path></svg><span class="side-menu__label">تکمیل اطلاعات </span><span class="badge badge-success side-badge">{{$verifyUrl[1]}}</span></a>
            </li>
            @endif
                <li class="slide">

                    <a class="side-menu__item" href="{{route("admin.dashboard")}}">
                        <i class="las la-home side-menu__icon "></i>
                        <span class="side-menu__label">داشبورد</span>
                    </a>
                </li>
                <li class="slide">

                    <a class="side-menu__item" href="{{route("dashboard.dashboard")}}">
                        <i class="las la-tachometer-alt side-menu__icon"></i>
                        <span class="side-menu__label"> داشبورد کاربری</span>
                    </a>
                </li>

                @if($user->getRoleName()!=\App\Models\User::$ROLE_USER)

                    <li class="slide">

                        <a class="side-menu__item" href="{{route("dashboard.profile")}}">
                            <i class="las la-user-tie side-menu__icon"></i>
                            <span class="side-menu__label">پروفایل  </span>
                        </a>
                    </li>
                @endif







                @if(App\Permissions\Permissions::Check(\App\Permissions\Permissions::$_IdentificationCards))
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                            <i class="las la-id-badge side-menu__icon"></i>
                            <span class="side-menu__label"> مدارک شناسایی</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                                <li>
                                    <a class="slide-item" href="{{route("admin.IdentificationCards_new")}}">مدارک شناسایی
                                        <span class="badge badge-info side-badge">جدید</span>
                                    </a></li>
                                <li>
                                    <a class="slide-item" href="{{route("admin.IdentificationCards_confirm")}}">مدارک شناسایی
                                        <span class="badge badge-success side-badge">تایید شده</span>
                                    </a></li>
                                <li>
                                    <a class="slide-item" href="{{route("admin.IdentificationCards_close")}}">مدارک شناسایی
                                        <span class="badge badge-danger side-badge">تایید نشده</span>
                                    </a></li>




                        </ul>
                    </li>
                @endif

                @if(App\Permissions\Permissions::Check(\App\Permissions\Permissions::$_BankCards_check))
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#">
                            <i class="las la-money-check-alt side-menu__icon"></i>
                            <span class="side-menu__label"> مدارک بانکی</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">

                            <li><a class="slide-item"  href="{{route("admin.BankCards_new")}}">مدارک بانکی
                                    <span class="badge badge-info side-badge">جدید</span>
                                </a></li>
                            <li><a class="slide-item"  href="{{route("admin.BankCards_confirm")}}">مدارک بانکی
                                    <span class="badge badge-success side-badge">تایید شده</span>
                                </a></li>

                            <li><a class="slide-item"  href="{{route("admin.BankCards_close")}}">مدارک بانکی
                                    <span class="badge badge-danger side-badge">تایید نشده</span>

                                </a></li>





                        </ul>
                    </li>
                @endif

            <li class="slide">
                    <form id="logout" class="d-none" method="post" action="{{route("logout")}}"> @csrf</form>

                    <a onclick="document.getElementById('logout').submit()" class="side-menu__item" href="#">
                        <i class="las la-sign-out-alt side-menu__icon"></i>
                        <span class="side-menu__label">خروج </span>
                        </a>
                </li>



        </ul>
    </div>
</aside>
