@extends("dashboard.layout.index")

@section("body")

    <div>
        @if(session()->has('success'))
            <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
            @if($errors->any())
                {!!  implode('', $errors->all('<div class="alert alert-danger mt-2">:message</div>'))  !!}
            @endif
    </div>

    <div id="app" class="container-fluid">


        <div class="row row-sm" id="filter_form">
            <div class="col-xl-12 mt-5">
                <div class="card">

                    <form method="post" class="card-body" action="">
                        <div class="row row-sm mg-b-20 mt-4 ">
                            <h5 class="col-12 title border-top pt-3 mb-5 bold title_form">اطلاعات کاربر </h5>
                            <div class="col-lg-4">
                                <label>
                                    نام
                                </label>
                                <input name="name" value="{{old("name")}}"  class="form-control ">
                            </div>
                            <div class="col-lg-4">
                                <label>
                                    ایمیل
                                </label>
                                <input name="email" value="{{old("email")}}" class="form-control ">
                            </div>

                            <div class="col-lg-4">
                                <label>
                                    نقش
                                </label>
                               <select name="role" class="form-control">
                                   @foreach($roles as $role):
                                       <option value="{{$role->id}}" >{{$role->name}}</option>
                                   @endforeach
                               </select>
                            </div>




                            <div class="col-lg-4">
                                <label>
                                    رمز عبور
                                </label>
                                <input name="password"  class="form-control ">
                            </div>
                            <div class="col-lg-4">
                                <label>
                                    تکرار رمز عبور
                                </label>
                                <input name="password_confirm"  class="form-control ">
                            </div>


                            <div class="col-12 mt-5">
                                <input type="submit"  class="btn-primary btn" value="ذخیره">
                            </div>

                            <div class="d-none">

                                @csrf


                            </div>

                          </div>
                </form><!-- bd -->
            </div>
        </div>

    </div>





@endsection
