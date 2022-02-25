<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">

                <a href=""><img src="/admin/valex/assets/img/brand/logo.png" class="logo-1" alt="لوگو"></a>
                <a href=""><img src="/admin/valex/assets/img/brand/logo-white.png" class="dark-logo-1" alt="لوگو"></a>
                <a href=""><img src="/admin/valex/assets/img/brand/favicon.png" class="logo-2" alt="لوگو"></a>
                <a href=""><img src="/admin/valex/assets/img/brand/favicon.png" class="dark-logo-2" alt="لوگو"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>

        </div>
        <div class="main-header-right">

            <div class="nav nav-item  navbar-nav-right ml-auto">

<form action="/logout" method="post">
    {{ csrf_field() }}
    <button class="btn btn-danger small btn-sm">خروج</button>

</form>

            </div>
        </div>
    </div>
</div>
