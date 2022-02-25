@extends("dashboard.layout.index")

@section("body")

    <div>
        @if(session()->has('success'))
            <div class="alert alert-success mt-2">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <div id="app" class="container-fluid">


        <div class="row row-sm" id="filter_form">
            <div class="col-xl-12 mt-5">
                <div class="card">

                    <form method="post" class="card-body" action="">
                        <div class="row row-sm mg-b-20 mt-4 ">
                            <h5 class="col-12 title border-top pt-3 mb-5 bold title_form">اطلاعات نقش </h5>
                            <div class="col-lg-4">
                                <label>
                                    نام نقش
                                </label>
                                <input name="name" value="{{$role->name}}" class="form-control ">
                            </div>
                            <div class="col-lg-4">
                                <label>
                                  دسترسی ها
                                </label>
                                <div>
                                   <ul>
                                       <li v-for="permission in user_permission" class="mb-3" >
                                           <span v-on:click="remove_permission(permission.id)" class="badge badge-danger btn btn-primary ml-2">حذف</span>
                                          <strong>@{{ permission.name }} </strong>

                                       </li>

                                   </ul>
                                </div>
                                <hr>
                                <span class="mb-2">افزودن نقش</span>
                               <select v-on:change="on_select_permission" name="permission_id" class="form-control mt-3">

                                   <option ></option>
                                   <option v-for="permission in all_permission" :value="permission.id">@{{ permission.name }}</option>

                               </select>
                            </div>
                            <div class="col-lg-12">
                                <input  type="submit" value="ذخیره" class="btn btn-primary" >
                            </div>


                            <div class="d-none">
                                <input :name="'permissions['+index+']'" v-for="permission,index in user_permission" :value="permission.id" />
                                <textarea id="json_data">{{json_encode([$role,$permissions])}}</textarea>
                                @csrf


                            </div>

                          </div>
                </form><!-- bd -->
            </div>
        </div>

    </div>



    <script>

        let model_data=JSON.parse(document.getElementById("json_data").value);

        const app = new Vue({
            el:"#app",
            data:{
                user_permission:model_data[0].permissions,
                all_permission:model_data[1],
                model_data:model_data,

            },
            methods:{
                "on_select_permission":function(data){
                    let permission_id=data.target.value;
                    if (permission_id==="")return;
                    let permission=this.all_permission.find(function(item){
                        return item.id==permission_id;
                    });
                    //check exists
                    let user_permission=this.user_permission.find(function(item){
                        return item.id==permission.id;
                    });
                    if (user_permission)
                    {
                        alert("این نقش قبلا انتخاب شده است");
                        return;
                    }
                    this.user_permission.push(permission);

                },
                "remove_permission":function(id){
                    this.user_permission=this.user_permission.filter(function(item){ return item.id!=id;})
                },
            }
        });

    </script>

@endsection
