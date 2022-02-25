@extends('front.layout.index')
@section("body")
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="p-4 shadow border rounded">


                        <h5> احراز هویت
                           </h5>

                        <ul class="list-unstyled feature-list text-muted">
                            <li><i class="mdi mdi-pan-right mdi-24px mr-2"></i>
                                 فایل مورد نظر را از این
                                <a href="/help/auth.jpg">لینک</a>
                                دانلود کنید، آن را پرینت بگیرید، مطالعه کنید و بعد از تکمیل اطلاعات مورد نظر، امضا کنید.</li>
                            <li><i class="mdi mdi-pan-right mdi-24px mr-2"></i>کارت ملی خود را در قسمت مشخص شده در فرم بچسبانید و از خودتان به همراه فرم، عکس بگیرید.</li>
                            <li><i class="mdi mdi-pan-right mdi-24px mr-2"></i> به صورت جدا از کارت ملی خود نیز عکس بگیرید.</li>
                            <li><i class="mdi mdi-pan-right mdi-24px mr-2"></i>عکس ها باید به طور مستقیم و ویرایش نشده ارسال شده باشند هرگونه ویرایش تصویر سبب لغو سفارش شما میشود</li>
                            <li><i class="mdi mdi-pan-right mdi-24px mr-2"></i> عکس های گرفته شده را از طریق فیلدهای زیر برای ما ارسال نمایید.</li>



                        </ul>
                        <p>نکته: در صورتی که امکان پرینت گرفتن فایل برای شما فراهم نیست، می‌توانید روی کاغذ A4 عینا متن فایل را بنویسید و امضا کنید.</p>

                        <p>نکته: نکته: لطفا دقت فرمایید عکس ارسالی شما کاملا مشابه نمونه عکس مورد قبول باشد.</p>

                        <img class="m-2 rounded" src="/help/auth-225x300.jpg"/>
                        <img style="max-width: 300px" class="m-2 rounded" src="/help/National_card.jpg"/>

                    </div>
                    <div class="mt-3">

                        <a href="/help/auth.jpg" class="btn btn-outline-primary mt-2">دانلود فایل</a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection
