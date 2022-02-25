@extends("dashboard.layout.index")

@section("body")

    <style>
        .remove_filter_item{
            font-size: 9px !important;
            width: 17px;
            height: 16px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding-top: 3px;

            border-radius: 11px;
        }

        .pointer{
            cursor: pointer;
            user-select: none;
        }
        .sort_btn:hover{
            transform: scale(1.3);
            transition: all 0.1s;
            color: gray;
        }


    </style>
    <div class="container-fluid">



        <div class="row row-sm" id="filter_form">
            <div class="col-xl-12 mt-5">
                <div class="card">

                    <div class="card-body" >
                        <div class="main-content-label  ">
                            افزودن یک فیلتر
                            <small v-on:click="is_show_filter_body=!is_show_filter_body" class="btn mr-1 btn-outline-dark btn-primary btn-sm float-left pointer">
                                @{{ !is_show_filter_body?"  نمایش فیلتر ها ":"   بستن فیلتر ها" }}
                            </small>
                            <small v-on:click="window.location.href=url" class="btn btn-outline-dark btn-primary btn-sm float-left pointer">
                               حذف فیلتر ها
                            </small>
                        </div>
                        <div class="row row-sm mg-b-20 mt-4 " v-show="is_show_filter_body">
                            <div class="col-lg-4">

                                <select @change="onChange($event)" class="form-control select2-no-search select2-hidden-accessible"  >
                                    <option value="-1">یک فیلتر انتخاب کنید</option>
                                    <option v-for="filter,index in filters.items" :value="index" >
                                        @{{ filter.title }}
                                    </option>
                                </select>
                            </div><!-- col-4 -->

                        </div>
                        <div class="row row-sm mg-b-20 " v-show="selected_filters.length>0">



                            <div class="form-group col-md-4 pb-1" v-for="filter_input,index in selected_filters">
                                <div>
                                    <small v-on:click="remove_filter_input(index)"  class="pointer remove_filter_item badge-danger ml-1">X</small>
                                    <label>@{{ filter_input.title }}</label>
                                </div>
                                <input v-model="filter_input.data" :type="filter_input.type" class="form-control"  :placeholder="filter_input.placeholder">

                            </div>




                            <div class="form-group col-md-12">
                               <small v-on:click="filter()" class="btn btn-outline-dark btn-primary  wd-100 pointer">فیلتر</small>
                            </div>



                        </div>
                    </div>
                </div><!-- bd -->
            </div>
        </div>






        <!-- row -->
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            @if(count($data)!=0)
                            <table class="table table-striped mb-5 text-md-nowrap">
                                <thead>
                                <?php
                                    /**
                                     * @var $table \App\query_builder\table\Table
                                     * @var $column \App\query_builder\table\Column
                                     */

                                ?>
                                <tr>
                                   @foreach($table->getColumns() as $column)
                                    <th>
                                        {{$column->getColumnTitle()}}
                                        <div class="d-flex ">
                                            <i class="typcn typcn-arrow-up-outline pointer sort_btn"></i>
                                            <i class="typcn typcn-arrow-down-outline pointer  sort_btn"></i>
                                        </div>
                                    </th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $report)
                                    <tr>
                                        @foreach($table->getColumns() as $column)
                                        <td>{!! $column->getCallback()($report) !!}</td>
                                        @endforeach
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                                {{ $data->links() }}
                            @else
                                <div class="text-center">
                                    <img class="width-50" src="/assets/image/search.gif" style="width: 250px;">
                                    <h3 class="card-title mb-5 text-center ">بدون هیچ رکوردی</h3>
                                </div>


                            @endif
                        </div><!-- bd -->

                    </div><!-- bd -->
                </div><!-- bd -->
            </div>
        </div>
        <!-- row closed -->
    </div>
    <script>

        var search_items = JSON.parse(atob('{{ base64_encode(json_encode($table->getSearchItem()))}}'));

        let filter_form=new Vue(
            {
                el:"#filter_form",
                data:{
                    url:"{{$table->getUrl()}}",
                    is_show_filter_body:false,
                    selected_filters:[],
                    filters:{
                        items:search_items,
                    }
                },
                methods:{
                    onChange:function (event) {
                        let index=event.target.value
                        if (!index || index==-1)return
                        event.target.value="-1";
                        let selected_item=this.filters.items[index]
                        let is_before_added_to_selected_filters=false;
                        this.selected_filters.forEach((filter)=>{
                           if (filter.name==selected_item.name)is_before_added_to_selected_filters=true;
                        })
                        if (!is_before_added_to_selected_filters)this.selected_filters.push(selected_item)
                    },
                    remove_filter_input:function (index){
                        this.selected_filters.splice(index,1);
                    },
                    filter:function () {

                       let url=this.url;
                        this.selected_filters.forEach((filter)=>{
                          if (filter.data){
                            url+=`&filter[${filter.name}]=${filter.data}`;
                          }
                        })
                        window.location.href=url;
                    }
                }
            }
        );
        function filterResults(){
            let href ='/dashboard/reports?'
            var moodle_user_id = document.getElementById("moodle_user_id").value;
            var first_name = document.getElementById("first_name").value;
            var last_name = document.getElementById("last_name").value;
            var payment_code = document.getElementById("payment_code").value;
            var course_name = document.getElementById("course_name").value;

            href += 'include=course,moodle_user';

            if(moodle_user_id.length){
                href += '&filter[moodle_user_id]=' + moodle_user_id;
            }
            if(first_name.length){
                href += '&filter[moodle_user.first_name]=' + first_name;
            }
            if(last_name.length){
                href += '&filter[moodle_user.last_name]=' + last_name;
            }
            if(payment_code.length){
                href += '&filter[payment_code]=' + payment_code;
            }
            if(course_name.length){
                href += '&filter[course_name]=' + course_name;
            }
            document.location.href = href;
        }
        document.getElementById("filter-button").addEventListener("click", filterResults)
    </script>
@endsection
