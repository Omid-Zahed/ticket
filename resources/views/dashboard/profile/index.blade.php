@extends("dashboard.layout.index")

@section("body")
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">صفحات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ مشخصات</span>
                </div>
            </div>

        </div>
        <!-- breadcrumb -->
        <!-- row -->
        <div class="row row-sm">
            <div class="col-lg-4">
                <div class="card mg-b-20">
                    <div class="card-body text-center">
                        <div class="pl-0">
                            <div class="main-profile-overview">
                                <div class="main-img-user profile-user">
                                    <img alt="" src="/assets/image/avatar-profile.jpg">

                                </div>
                                <div>
                                    <h4 class="font-weight-semibold mt-3 mb-0"></h4>

                                    <h5 class="main-profile-name">{{\Illuminate\Support\Facades\Auth::user()->name}} </h5>
                                    <p class="main-profile-name-text">{{\Illuminate\Support\Facades\Auth::user()->roles()->first()->name??null}}  </p>
                                </div>






                            </div><!-- main-profile-overview -->
                        </div>
                    </div>
                </div>
            </div>


{{--            <div class="col-lg-8">--}}
{{--                <div class="row row-sm">--}}
{{--                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">--}}
{{--                        <div class="card overflow-hidden sales-card bg-primary-gradient">--}}
{{--                            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">--}}
{{--                                <div class="">--}}
{{--                                    <h6 class="mb-3 tx-12 text-white">محصول فروخته شده</h6>--}}
{{--                                </div>--}}
{{--                                <div class="pb-0 mt-0">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="">--}}
{{--                                            <h4 class="tx-20 font-weight-bold mb-1 text-white">480000 تومان</h4>--}}
{{--                                            <p class="mb-0 tx-12 text-white op-7">در مقایسه با هفته گذشته</p>--}}
{{--                                        </div>--}}
{{--                                        <span class="float-right my-auto mr-auto">--}}
{{--										<i class="fas fa-arrow-circle-down text-white"></i>--}}
{{--										<span class="text-white op-7"> -152.3</span>--}}
{{--									</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <span id="compositeline4" class="pt-1"><canvas width="264" height="30" style="display: inline-block; width: 264.059px; height: 30px; vertical-align: top;"></canvas></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">--}}
{{--                        <div class="card overflow-hidden sales-card bg-primary-gradient">--}}
{{--                            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">--}}
{{--                                <div class="">--}}
{{--                                    <h6 class="mb-3 tx-12 text-white">محصول فروخته شده</h6>--}}
{{--                                </div>--}}
{{--                                <div class="pb-0 mt-0">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="">--}}
{{--                                            <h4 class="tx-20 font-weight-bold mb-1 text-white">480000 تومان</h4>--}}
{{--                                            <p class="mb-0 tx-12 text-white op-7">در مقایسه با هفته گذشته</p>--}}
{{--                                        </div>--}}
{{--                                        <span class="float-right my-auto mr-auto">--}}
{{--										<i class="fas fa-arrow-circle-down text-white"></i>--}}
{{--										<span class="text-white op-7"> -152.3</span>--}}
{{--									</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <span id="compositeline4" class="pt-1"><canvas width="264" height="30" style="display: inline-block; width: 264.059px; height: 30px; vertical-align: top;"></canvas></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">--}}
{{--                        <div class="card overflow-hidden sales-card bg-primary-gradient">--}}
{{--                            <div class="pl-3 pt-3 pr-3 pb-2 pt-0">--}}
{{--                                <div class="">--}}
{{--                                    <h6 class="mb-3 tx-12 text-white">محصول فروخته شده</h6>--}}
{{--                                </div>--}}
{{--                                <div class="pb-0 mt-0">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="">--}}
{{--                                            <h4 class="tx-20 font-weight-bold mb-1 text-white">480000 تومان</h4>--}}
{{--                                            <p class="mb-0 tx-12 text-white op-7">در مقایسه با هفته گذشته</p>--}}
{{--                                        </div>--}}
{{--                                        <span class="float-right my-auto mr-auto">--}}
{{--										<i class="fas fa-arrow-circle-down text-white"></i>--}}
{{--										<span class="text-white op-7"> -152.3</span>--}}
{{--									</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <span id="compositeline4" class="pt-1"><canvas width="264" height="30" style="display: inline-block; width: 264.059px; height: 30px; vertical-align: top;"></canvas></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">--}}
{{--                        <div class="card ">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="counter-status d-flex md-mb-0">--}}
{{--                                    <div class="counter-icon bg-primary-transparent">--}}
{{--                                        <i class="icon-layers text-primary"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="mr-auto">--}}
{{--                                        <h5 class="tx-13">سفارشات</h5>--}}
{{--                                        <h2 class="mb-0 tx-22 mb-1 mt-1">1،587</h2>--}}
{{--                                        <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i> افزایش دادن </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">--}}
{{--                        <div class="card ">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="counter-status d-flex md-mb-0">--}}
{{--                                    <div class="counter-icon bg-danger-transparent">--}}
{{--                                        <i class="icon-paypal text-danger"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="mr-auto">--}}
{{--                                        <h5 class="tx-13">درآمد</h5>--}}
{{--                                        <h2 class="mb-0 tx-22 mb-1 mt-1">46،782</h2>--}}
{{--                                        <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i> افزایش دادن </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">--}}
{{--                        <div class="card ">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="counter-status d-flex md-mb-0">--}}
{{--                                    <div class="counter-icon bg-success-transparent">--}}
{{--                                        <i class="icon-rocket text-success"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="mr-auto">--}}
{{--                                        <h5 class="tx-13">محصول فروخته شده</h5>--}}
{{--                                        <h2 class="mb-0 tx-22 mb-1 mt-1">1890</h2>--}}
{{--                                        <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>  افزایش دادن </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">--}}
{{--                        <div class="card ">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="counter-status d-flex md-mb-0">--}}
{{--                                    <div class="counter-icon bg-primary-transparent">--}}
{{--                                        <i class="icon-layers text-primary"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="mr-auto">--}}
{{--                                        <h5 class="tx-13">سفارشات</h5>--}}
{{--                                        <h2 class="mb-0 tx-22 mb-1 mt-1">1،587</h2>--}}
{{--                                        <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i> افزایش دادن </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">--}}
{{--                        <div class="card ">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="counter-status d-flex md-mb-0">--}}
{{--                                    <div class="counter-icon bg-danger-transparent">--}}
{{--                                        <i class="icon-paypal text-danger"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="mr-auto">--}}
{{--                                        <h5 class="tx-13">درآمد</h5>--}}
{{--                                        <h2 class="mb-0 tx-22 mb-1 mt-1">46،782</h2>--}}
{{--                                        <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i> افزایش دادن </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">--}}
{{--                        <div class="card ">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="counter-status d-flex md-mb-0">--}}
{{--                                    <div class="counter-icon bg-success-transparent">--}}
{{--                                        <i class="icon-rocket text-success"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="mr-auto">--}}
{{--                                        <h5 class="tx-13">محصول فروخته شده</h5>--}}
{{--                                        <h2 class="mb-0 tx-22 mb-1 mt-1">1890</h2>--}}
{{--                                        <p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>  افزایش دادن </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
        </div>
        <!-- row closed -->
    </div>
@endsection
