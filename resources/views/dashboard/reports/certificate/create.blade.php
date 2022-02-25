@extends("dashboard.layout.index")

@section("body")
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <style>
        .title_form{
            font-weight: bold;
            border-right: 5px solid #c8cfe1;
        }


        .course_search_body{
            background: #fff;
            z-index: 1;
            left: 10px;
            right: 10px;
            min-height: 190px;
            box-shadow: 2px 4px 31px -21px #00000073;
            border-radius: 13px  !important;
            max-height: 300px;
            overflow-y: scroll;
        }
        .course_search_item{
            border-bottom: 1px dashed #bfb4b4;
            margin: 6px 10px;
            color: #2a2828;
            cursor: pointer;
            transition: 0.1s all ;
            display: flex;
        }
        .course_search_item img{
            width: 80px;
            height: 80px;
            border-radius: 5px;

        }
        .course_search_item h4{
            font-size: 16px;
            margin: 20px 20px;

        }
        .course_search_item:hover{
            background: #f5f5f5;
            color: #1C8DBE;
        }
    </style>
    <form id="app" enctype="multipart/form-data" method="post" action="" class="container-fluid">


        @csrf
        @if (count($errors) > 0)
            <div class="alert alert-danger mt-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row row-sm" id="filter_form">
            <div class="col-xl-12 mt-5">
                <div class="card">

                    <div class="card-body " >
                        <div class="main-content-label  mb-5">
                            افزودن یک سرتیفیکیت جدید

                        </div>
                        <div class="row row-sm mg-b-20 mt-4 ">
                            <h5  class="col-12 title border-top pt-3 mb-5 bold title_form">اطلاعات دانشجو </h5>
                            <div class="col-lg-4">
                                <label>نام و نام خانوادگی
                                    (<strong>farsi</strong>)
                                </label>
                                <input class="form-control " name="name_fa"/>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <label>
                                    نام و نام خانوادگی
                                    (<strong>english</strong>)
                                </label>
                                <input class="form-control " name="name_en"/>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <label>
                                    کد ملی
                                </label>
                                <input class="form-control " name="national_code"/>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <label>
                                    صادره از
                                </label>
                                <input class="form-control " name="issued"/>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <label>
                                    تاریخ تولد
                                </label>
                                <input class="form-control " name="birthday"/>
                            </div>

                            <div class="col-lg-4 mb-5">


                                {{--                                <input class="form-control d-block " name="user_image_file"/>--}}

                                <label class="d-block mt-3">
                                    فایل تصویر دانشجو
                                </label>
                                <input  accept="image/png, image/jpeg"  class="d-block" type="file" name="image_file">
                            </div>


                            <div class="col-lg-4 mb-5">
                                <label>
                                    moodle user id (-1 for none user)
                                </label>
                                <input class="form-control " style="font-size: 12px;"  placeholder="در صورتی که یوزر خارج از سیستم هستش منفی یک به صورت عدد وارد کنید" name="moodle_user_id"/>
                            </div>


                            <h5  class="col-12 title border-top pt-3 title_form">اطلاعات درس</h5>


                            <div class="col-lg-6 mt-5">
                                <label>
                                    جستجوی درس
                                    <strong class="badge badge-info" v-show="is_searching">درحال جستجوی درس </strong>
                                </label>
                                <input v-bind:search_result_count="search_result_count" v-model="course_name"  class="form-control " name="name_fa_course"/>
                                <span v-on:click="close()" v-if="(search_result.length>0) || is_searching "  class="btn btn-primary">بستن </span>
                                <div v-if="(search_result.length>0) || is_searching " class="mt-3 p-1 position-absolute border rounded bg-white course_search_body">

                                    <div v-on:click="select_course(search_item.id,search_item.fullname)"  class="p-1 border-bottom course_search_item" v-for="search_item in search_result">
                                        <img  :src="'http://novinparsian.com/'+search_item.image">
                                        <h4>
                                            @{{search_item.fullname}}
                                            <span style="font-size: 12px !important;" class="badge badge-info font-weight-bold">@{{ search_item.tag_name }}</span>
                                        </h4>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-6 mt-5">
                                <label>
                                    نام درس
                                    (<strong>farsi</strong>)
                                </label>
                                <input v-model="course_farsi_name" class="form-control" name="name_fa_course"/>

                            </div>
                            <div class="col-lg-6 mt-5">
                                <label>
                                    نام درس
                                    (<strong>english</strong>)
                                </label>
                                <input class="form-control" name="name_en_course"/>

                            </div>

                            <div class="col-lg-6 mt-5">
                                <label>
                                    مدت دوره
                                    (<strong>farsi</strong>)
                                </label>
                                <input class="form-control " name="course_duration_fa"/>
                            </div>
                            <div class="col-lg-6 mt-5">
                                <label>
                                    مدت دوره
                                    (<strong>english</strong>)
                                </label>
                                <input class="form-control " name="course_duration_en"/>
                            </div>

                            <div class="col-lg-4 mt-5">
                                <label>
                                    moodle course id (-1 for none)
                                </label>
                                <input placeholder="در صورتی که درس خارج از سیستم مودل هستش -۱ وارد کنید" v-model="course_selected_id" class="form-control " name="moodle_course_id"/>

                                <div v-if="course_selected_id>0" class="mt-3">
                                    <a  class="d-block mb-3" target="_blank" :href="'https://novinparsian.com/pages/single-course/?id='+course_selected_id"> صفحه فرانت درس</a>
                                    <a class="d-block" target="_blank" :href="'https://novinparsian.com/course/view.php?id='+course_selected_id">صفحه مدیریت درس</a>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-5">
                                <label>
                                    تاریخ ایجاد
                                    (<strong>شمسی</strong>)
                                </label>
                                <input  onchange="on_change_date_picker_sh(this)" data-jdp placeholder="مقدار خالی برابر با تریخ امروز هستش" class="form-control " name="date_fa"/>
                            </div>

                            <div class="col-lg-6 mt-5">
                                <label>
                                    تاریخ ایجاد
                                    (<strong>میلادی</strong>)
                                </label>
                                <input id="date_picker_en" class="form-control " name="date_en" placeholder="مقدار خالی برابر با تریخ امروز هستش"/>
                            </div>
                        </div>
                        <div class="row row-sm mg-b-20 " >

                            <div class="form-group col-md-12">
                                <button  class="btn btn-outline-dark btn-primary  wd-100 pointer">ایجاد </button>
                            </div>



                        </div>
                    </div>
                </div><!-- bd -->
            </div>
        </div>







    </form>

    <script>
        var search_url="https://novinparsian.com/webservice/rest/server.php?moodlewsrestformat=json&wstoken=52dcd4d7de688cd47693833da8d7df65&wsfunction=local_custom_service_search_courses_sections&category=&search=[search]&sort=startdate.down&tag=&page=1";
        let App=new Vue({
            el:"#app",
            data:{
                is_searching:false,
                course_name:"",
                course_farsi_name:"",
                course_selected_id:"",
                last_search:null,
                search_result:[],
            },
            methods:{
                select_course:function (course_id,course_name) {
                    this.course_farsi_name=course_name;
                    this.course_selected_id=course_id;
                    this.search_result=[];
                },
                close:function (){
                    this.search_result=[];
                }
            },
            computed: {
                // a computed getter
                search_result_count: function () {
                    if (this.is_searching) return ;
                    if (this.last_search ===this.course_name) return ;
                    if (this.course_name.length>3){
                        this.is_searching=true;

                        setTimeout(()=>{
                            this.last_search=this.course_name;
                            let url=search_url.replace("[search]",this.course_name);
                            axios.get(url).then(response=>{
                                this.is_searching=false;
                                this.search_result=response.data.search_result;
                                console.log(response.data.search_result);
                            }).catch(error=>{
                                this.is_searching=false;
                                console.log(error);
                            })
                        },1000)

                    }

                }
            }
        });

        function on_change_date_picker_sh(el) {
            var input = el.value;
            var m = moment.from(input, 'fa', 'YYYY/MM/DD');

            if (m.isValid()){
                output = m.locale('en').format('YYYY/MM/DD');
            } else {
                output = ""
            }
            document.getElementById("date_picker_en").value=output;
        }

        (function (){
            jalaliDatepicker.startWatch();

        })()

    </script>

@endsection
