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
                                        <h4 class="mb-4">ورود</h4>

                                    </div>

                                    <form class="login-form" method="POST" action="{{ route('login') }}" >
                                        @csrf

                                        <div class="row">
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
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input name="remember" type="checkbox" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customCheck1">مرا به خاطر بسپار</label>
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12 mb-0">
                                                <button class="btn btn-primary w-100">ورود</button>
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
