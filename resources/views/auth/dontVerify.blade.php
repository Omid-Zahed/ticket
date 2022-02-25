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
                                        <h4 class="mb-4">ایمیل خود را تایید کنید</h4>
                                    </div>
                                    <div class="login-form w-100" method="POST" action="{{ route('login') }}" >

                                        <div class="row">



                                            <p>لینک تایید به ایمیل شما ارسال شده است</p>


                                            <form class="row w-100 col-12" method="POST" action="{{route("verification.sendEmail")}}">
                                                @csrf
                                                <div class="col-lg-12 mb-1">
                                                    <button class="btn btn-primary w-100">ارسال دوباره ایمیل</button>
                                                </div><!--end col-->
                                            </form>


                                           <form class="row w-100 col-12"   method="POST" action="{{ route('logout') }}">
                                               @csrf
                                               <div class="col-lg-12 mb-2">
                                                   <button class="btn btn-primary w-100">ورود با ایمیل دیگر</button>
                                               </div><!--end col-->
                                           </form>

                                            @if (\Session::has('success'))
                                                <div class="alert alert-success">
                                                    {!! \Session::get('success') !!}
                                                </div>
                                            @endif


                                        </div><!--end row-->
                                    </div>
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
