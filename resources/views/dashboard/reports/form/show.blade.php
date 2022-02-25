@extends("dashboard.layout.index")
<?php
/**
     * @var \App\Models\Form $form
     *
 * */

    $data= ($form->data);
    $translate =($form->translate) ;

//    dd($data,$translate);
?>

@section("body")
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">صفحات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ فرم</span>
                </div>
            </div>

        </div>
        <!-- breadcrumb -->
        <!-- row -->
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-body">
                        <h4 class="text-center mb-5 mt-3">{{$form->type}}</h4>


                        @foreach($data as $key=>$item)
                        <div class="border mb-3 p-3 rounded">
                            <strong>
                                {{$translate[$key]??$key}} :
                            </strong>
                            <p class="mt-3 ">
                                {{$item}}
                            </p>
                        </div>
                        @endforeach


                    </div><!-- bd -->
                </div><!-- bd -->
            </div>
        </div>
        <!-- row closed -->
    </div>
@endsection
