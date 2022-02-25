

@php
$admin_src="/admin/valex/";

@endphp
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="FT Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
    <!-- Title -->
    <title>
        @if(View::hasSection('title'))
            @yield('title')
        @else
            وب سایت
        @endif
    </title>
    <script src="https://unpkg.com/jalali-moment/dist/jalali-moment.browser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <link type="text/css" rel="stylesheet" href="/assets/jalalidatepicker/jalalidatepicker.min.css" />
    <script type="text/javascript" src="/assets/jalalidatepicker/jalalidatepicker.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="/admin/valex/assets/img/brand/favicon.png" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="/admin/valex/assets/css/icons.css" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="/admin/valex/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>
    <!--  Sidebar css -->
    <link href="/admin/valex/assets/plugins/sidebar/sidebar.css" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="/admin/valex/assets/css-rtl/sidemenu.css">
    <!--  Owl-carousel css-->
    <link href="/admin/valex/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />
    <!-- Maps css -->
    <link href="/admin/valex/assets/plugins/jqvmap/jqvmap.min.css" rel="stylesheet">
    <!--- Style css -->
    <link href="/admin/valex/assets/css-rtl/style.css" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="/admin/valex/assets/css-rtl/style-dark.css" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="/admin/valex/assets/css-rtl/skin-modes.css" rel="stylesheet">

    <!---Switcher css-->
    <link href="/admin/valex/assets/switcher/css/switcher-rtl.css" rel="stylesheet">
    <link href="/admin/valex/assets/switcher/demo.css" rel="stylesheet">	</head>


<body class="main-body app   sidebar-mini">



<!-- Loader -->
{{--<div id="global-loader">--}}
{{--    <img src="/admin/valex/assets/img/loader.svg" class="loader-img" alt="لودر">--}}
{{--</div>--}}
<!-- /Loader -->
<!-- main-sidebar -->
@include("dashboard.layout.main-sidebar")
<!-- main-sidebar -->

<!-- main-content -->
<div class="main-content app-content">
    <!-- main-header opened   menu ============== -->
@include("dashboard.layout.menu")
    <!-- /main-header -->

    <!-- container ================= -->
    @yield("body")

</div>
<!-- Container closed -->
<!-- Sidebar-right-->
@include("dashboard.layout.sidebar-left")
<!--/Sidebar-right-->
<!-- Message Modal -->
<div class="modal fade" id="chatmodel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right chatbox" role="document">
        <div class="modal-content chat border-0">
            <div class="card overflow-hidden mb-0 border-0">
                <!-- action-header -->
                <div class="action-header clearfix">
                    <div class="float-right hidden-xs d-flex ml-2">
                        <div class="img_cont ml-3">
                            <img src="/admin/valex/assets/img/faces/6.jpg" class="rounded-circle user_img" alt="img">
                        </div>
                        <div class="align-items-center mt-2">
                            <h4 class="text-white mb-0 font-weight-semibold">دنیل اسکات</h4>
                            <span class="dot-label bg-success"></span><span class="mr-3 text-white">آنلاین</span>
                        </div>
                    </div>
                    <ul class="ah-actions actions align-items-center">
                        <li class="call-icon">
                            <a href="#" class="d-done d-md-block phone-button" data-toggle="modal" data-target="#audiomodal">
                                <i class="si si-phone"></i>
                            </a>
                        </li>
                        <li class="video-icon">
                            <a href="#" class="d-done d-md-block phone-button" data-toggle="modal" data-target="#videomodal">
                                <i class="si si-camrecorder"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-expanded="true">
                                <i class="si si-options-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><i class="fa fa-user-circle"></i> مشاهده نمایه</li>
                                <li><i class="fa fa-users"></i>دوستان اضافه کنید</li>
                                <li><i class="fa fa-plus"></i> افزودن به گروه</li>
                                <li><i class="fa fa-ban"></i> مسدود کردن</li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="" data-dismiss="modal" aria-label="بستن">
                                <span aria-hidden="true"><i class="si si-close text-white"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- action-header end -->

                <!-- msg_card_body -->
                <div class="card-body msg_card_body">
                    <div class="chat-box-single-line">
                        <abbr class="timestamp">1 مهر 1399</abbr>
                    </div>
                    <div class="d-flex justify-content-start">
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            سلام ، حال شما چطور است؟
                            <span class="msg_time">8:40 صبح ، امروز</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end ">
                        <div class="msg_cotainer_send">
                            سلام کانر پیج هستم من خوبم شما چطور؟
                            <span class="msg_time_send">8:55 صبح ، امروز</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            من هم خوب هستم <span class="msg_time">9:00 صبح امروز</span> متشکرم
                            <span class="msg_time"></span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end ">
                        <div class="msg_cotainer_send"><span class="msg_time_send">  ساعت 9:05</span>
                            از کانر پیج استقبال
                            <span class="msg_time_send">می کنید</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            آیا می توانید قالب را به روز کنید؟
                            <span class="msg_time">9:07 صبح ، امروز</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            اما من باید برای شما توضیح دهم که چگونه این همه اشتباه  <span class="msg_time_send">امروز 9:10 صبح </span>
                            <span class="msg_time_send"></span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            آیا می توانید قالب را به روز کنید؟
                            <span class="msg_time">9:07 صبح ، امروز</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            اما من باید برای شما توضیح دهم که چگونه این همه اشتباه  <span class="msg_time_send">امروز 9:10 صبح </span>
                            <span class="msg_time_send"></span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            آیا می توانید قالب را به روز کنید؟
                            <span class="msg_time">9:07 صبح ، امروز</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start">
                        <div class="img_cont_msg">
                            <img src="/admin/valex/assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            باشه خداحافظ ، بعدا برایت پیامک می کنیم ..
                            <span class="msg_time">9:12 صبح ، امروز</span>
                        </div>
                    </div>
                </div>
                <!-- msg_card_body end -->
                <!-- card-footer -->
                <div class="card-footer">
                    <div class="msb-reply d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control " placeholder="تایپ کردن....">
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-primary ">
                                    <i class="far fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- card-footer end -->
            </div>
        </div>
    </div>
</div>

<!--Video Modal -->
<div id="videomodal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark border-0 text-white">
            <div class="modal-body mx-auto text-center p-7">
                <h5>تماس ویدیویی والکس</h5>
                <img src="/admin/valex/assets/img/faces/6.jpg" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
                <h4 class="mb-1 font-weight-semibold">دنیل اسکات</h4>
                <h6>صدا زدن...</h6>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle mb-0 mr-3" href="#">
                                <i class="fas fa-video-slash"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle text-white mb-0 mr-3" href="#" data-dismiss="modal" aria-label="بستن">
                                <i class="fas fa-phone bg-danger text-white"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle mb-0 mr-3" href="#">
                                <i class="fas fa-microphone-slash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Audio Modal -->
<div id="audiomodal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0">
            <div class="modal-body mx-auto text-center p-7">
                <h5>تماس صوتی والکس</h5>
                <img src="/admin/valex/assets/img/faces/6.jpg" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
                <h4 class="mb-1  font-weight-semibold">دنیل اسکات</h4>
                <h6>صدا زدن...</h6>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle mb-0 mr-3" href="#">
                                <i class="fas fa-volume-up bg-light"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="icon icon-shape rounded-circle text-white mb-0 mr-3" href="#" data-dismiss="modal" aria-label="بستن">
                                <i class="fas fa-phone text-white bg-success"></i>
                            </a>
                        </div>
                        <div class="col-4">
                            <a class="icon icon-shape  rounded-circle mb-0 mr-3" href="#">
                                <i class="fas fa-microphone-slash bg-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- modal-body -->
        </div>
    </div><!-- modal-dialog -->
</div>
<!-- modal -->
<!-- Footer opened -->
@include("dashboard.layout.footer")
<!-- Footer closed -->
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="/admin/valex/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Bundle js -->
<script src="/admin/valex/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!--Internal  Perfect-scrollbar js -->
{{--<script src="/admin/valex/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>--}}
{{--<script src="/admin/valex/assets/plugins/perfect-scrollbar/p-scroll.js"></script>--}}
<!--Internal Sparkline js -->
<script src="/admin/valex/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Custom Scroll bar Js-->
<script src="/admin/valex/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- right-sidebar js -->
{{--<script src="/admin/valex/assets/plugins/sidebar/sidebar-rtl.js"></script>--}}
<script src="/admin/valex/assets/plugins/sidebar/sidebar-custom.js"></script>
<!-- Eva-icons js -->
<script src="/admin/valex/assets/js/eva-icons.min.js"></script>



<!--Internal  index js -->
<script src="/admin/valex/assets/js/jquery.vmap.sampledata.js"></script>
<!-- Sticky js -->
<script src="/admin/valex/assets/js/sticky.js"></script>
<!-- custom js -->
<script src="/admin/valex/assets/js/custom.js"></script><!-- Left-menu js-->
<script src="/admin/valex/assets/plugins/side-menu/sidemenu.js"></script>




@yield("footer_asset")



@if (Session::has('success_'))
    <script>
        alert("{{ Session::get('success_') }}");
    </script>
@endif
@if (Session::has('error_'))
    <script>
        alert("{{ Session::get('error_') }}");
    </script>
@endif

</body>
</html>
