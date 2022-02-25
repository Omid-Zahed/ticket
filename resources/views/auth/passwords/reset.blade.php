

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                                        <h4 class="mb-4">تغییر پسورد</h4>
                                    </div>
                                    <form class="login-form" method="POST" action="{{ route('password.update') }}" >
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group position-relative">
                                                    <label>ایمیل شما <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i>
                                                    <input type="email" class="form-control pl-5" value="{{$email??old("email")}}" placeholder="ایمیل" name="email" required="">
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
                                                <button class="btn btn-primary w-100">بروزرسانی</button>
                                            </div><!--end col-->




                                        </div><!--end row-->
                                    </form>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->

                <div class="col-lg-8 offset-lg-4 padding-less img order-1" style="background-image:url('/front/Landrick/images_used/login_backgroun.jpg')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->
            </div><!--end row-->
        </div><!--end container fluid-->
    </section><!--end section-->
    <!-- Hero End -->
@endsection



