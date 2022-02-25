

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
    <title> خرید و فروش ارز دیجیتالی
    </title>
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
@include("dashboard.layout.admin.main-sidebar")
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




<!-- Footer opened -->
@include("dashboard.layout.footer")
<!-- Footer closed -->
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="/admin/valex/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Bundle js -->
<script src="/admin/valex/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ionicons js -->
<script src="/admin/valex/assets/plugins/ionicons/ionicons.js"></script>
<!-- Moment js -->
<script src="/admin/valex/assets/plugins/moment/moment.js"></script>

<!-- Rating js-->
<script src="/admin/valex/assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="/admin/valex/assets/plugins/rating/jquery.barrating.js"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="/admin/valex/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/admin/valex/assets/plugins/perfect-scrollbar/p-scroll.js"></script>
<!--Internal Sparkline js -->
<script src="/admin/valex/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Custom Scroll bar Js-->
<script src="/admin/valex/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- right-sidebar js -->
<script src="/admin/valex/assets/plugins/sidebar/sidebar-rtl.js"></script>
<script src="/admin/valex/assets/plugins/sidebar/sidebar-custom.js"></script>
<!-- Eva-icons js -->
<script src="/admin/valex/assets/js/eva-icons.min.js"></script>
<!--Internal  Chart.bundle js -->
<script src="/admin/valex/assets/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Moment js -->
<script src="/admin/valex/assets/plugins/raphael/raphael.min.js"></script>
<!--Internal  Flot js-->
<script src="/admin/valex/assets/plugins/jquery.flot/jquery.flot.js"></script>
<script src="/admin/valex/assets/plugins/jquery.flot/jquery.flot.pie.js"></script>
<script src="/admin/valex/assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
<script src="/admin/valex/assets/plugins/jquery.flot/jquery.flot.categories.js"></script>
<script src="/admin/valex/assets/js/dashboard.sampledata.js"></script>
<script src="/admin/valex/assets/js/chart.flot.sampledata.js"></script>
<!--Internal Apexchart js-->
<script src="/admin/valex/assets/js/apexcharts.js"></script>
<!-- Internal Map -->
<script src="/admin/valex/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/valex/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/admin/valex/assets/js/modal-popup.js"></script>
<!--Internal  index js -->
<script src="/admin/valex/assets/js/jquery.vmap.sampledata.js"></script>
<!-- Sticky js -->
<script src="/admin/valex/assets/js/sticky.js"></script>
<!-- custom js -->
<script src="/admin/valex/assets/js/custom.js"></script><!-- Left-menu js-->
<script src="/admin/valex/assets/plugins/side-menu/sidemenu.js"></script>

<!-- Switcher js -->
<script src="/admin/valex/assets/switcher/js/switcher-rtl.js"></script>

<script src="/admin/valex/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

<!--Internal Fileuploads js-->
<script src="/admin/valex/assets/plugins/fileuploads/js/fileupload.js"></script>

<link href="/admin/valex/assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />
<script src="/admin/valex/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="/admin/valex/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="/admin/valex/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="/admin/valex/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="/admin/valex/assets/plugins/fancyuploder/fancy-uploader.js"></script>
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
