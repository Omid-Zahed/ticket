@extends('front.layout.index')
@section("body")
    <!-- Hero Start -->
    <section class="cover-user bg-white">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col-lg-4 cover-my-30 order-2">
                    <div class="cover-user-img d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <div class="login-page position-relative" style="z-index: 1">
                                    <div class="text-center">
                                        <h4 class="mb-4">ثبت نام</h4>
                                    </div>
                                    <form class="login-form" method="POST" action="{{ route('register') }}" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group position-relative">
                                                    <label>نام شما<span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" value="{{old("name")}}" placeholder="نام شما" name="name" required="">
                                                    @error("name")
                                                    <span class="badge badge-outline-danger mt-2 w-100">{{$message}}</span>
                                                    @enderror

                                                </div>
                                            </div><!--end col-->
                                            <div class="col-lg-12">
                                                <div class="form-group position-relative">
                                                    <label>ایمیل شما <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i>
                                                    <input type="email" class="form-control pl-5" value="{{old("email")}}" placeholder="ایمیل" name="email" required="">
                                                    @error("email")
                                                    <span class="badge badge-outline-danger mt-2 w-100">{{$message}}</span>
                                                    @enderror

                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="form-group position-relative">
                                                    <label>رمز عبور <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-key ml-3 icons"></i>
                                                    <input type="password" name="password" class="form-control pl-5" placeholder="رمز" required="">
                                                    @error("password")
                                                    <span class="badge badge-outline-danger mt-2 w-100">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-lg-12">
                                                <div class="form-group position-relative">
                                                    <label>تکرار رمز عبور  <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-key ml-3 icons"></i>
                                                    <input type="password" name="password_confirmation" class="form-control pl-5" placeholder="رمز" required="">

                                                </div>
                                            </div><!--end col-->



                                            <div class="col-lg-12 mb-0">
                                                <button class="btn btn-primary w-100">ثبت نام</button>
                                            </div><!--end col-->



                                            <div class="col-12 text-center">
                                                <p class="mb-0 mt-3"><small class="text-dark mr-2">حساب دارید؟</small> <a href="{{ route('login') }}" class="text-dark font-weight-bold">ورود</a></p>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->

                <div class="col-lg-8 offset-lg-4 padding-less img order-1" style="background-image:url('/assets/login.jpg')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->
            </div><!--end row-->
        </div><!--end container fluid-->
    </section><!--end section-->
    <!-- Hero End -->
@endsection

