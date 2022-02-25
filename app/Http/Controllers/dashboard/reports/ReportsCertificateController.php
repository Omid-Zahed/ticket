<?php

namespace App\Http\Controllers\dashboard\reports;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Http\Requests\certificate_form;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Report;
use App\query_builder\sort\SortCourseName;
use App\query_builder\table\Column;
use App\query_builder\table\Table;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class ReportsCertificateController extends BaseDashboardController
{

    public function index(){

        $table=Table::init("/dashboard/reports?1=1")
            ->addColumn(Column::init("شناسه گزارش	","id")->setSearch())
            ->addColumn(Column::init("شناسه کاربر در مودل","moodle_user_id")->setSearch())
            ->addColumn(Column::init("نام ","moodle_user.first_name")->setCallback(function ($data){
                try {
                    return  $data->moodle_user->first_name." ".$data->moodle_user->last_name;
                }catch (\Exception $e){
                    $data=json_decode($data->json_information);
                    return $data->data->name_fa;

                }

            }))
            ->addColumn(Column::init(" نام درس ","courses.name")->setCallback(function ($data){
                try {
                    return  $data->courses->name;
                }catch (\Exception $e){
                    $data=json_decode($data->json_information);

                    return $data->data->name_fa_course;

                }
            }))
            ->addColumn(Column::init(" تاریخ ایجاد ","created_at"))
            ->addColumn(Column::init("  pdf مشاهده سرتیفیکیت","courses.name")->setCallback(function ($data){return "<a target='_blank' href='/certificate_pdf/".$data->hash."'>مشاهده</a>";}))
            ->addColumn(Column::init(" html مشاهده سرتیفیکیت","courses.name")->setCallback(function ($data){return "<a target='_blank' href='/certificate_html/".$data->hash."'>مشاهده</a>";}))

        ;

        $data = QueryBuilder::for(Certificate::class)
            ->with("courses")
            ->with("moodle_user")
            ->allowedFilters([
                AllowedFilter::scope('course_name'),
                AllowedFilter::scope('course_tag'),
                AllowedFilter::exact('moodle_user_id'),
                AllowedFilter::exact('payment_code'),
                'moodle_user.first_name',
                'moodle_user.last_name',
                "price",
                "id",
                "date"
            ])
            ->allowedSorts([
                'price',
                AllowedSort::custom('course_name', new SortCourseName(), 'reports')])
            ->paginate(30)->withQueryString();;

        return view("dashboard.queryBuilder.table",compact('data',"table"));
    }
    public function create(){
        return view("dashboard.reports.certificate.create");
    }
    public function store(certificate_form  $certificate_form){

        //if file exist store
        if ($certificate_form->exists('image_file')){
            $path = $certificate_form->file('image_file')->store(
                'user_images', 'public'
            );
        }

        $data=$certificate_form->validated();
        $data['image_file_local']=$path??null;
        $json_information=new \stdClass();
        $json_information->driver="form";
        $json_information->data=$data;
        $json_information->data["name_en"]=ucwords($json_information->data["name_en"]);
        $json=json_encode($json_information);
        $hash=md5($json);
        DB::insert("INSERT INTO `certificates` (`id`, `moodle_user_id`, `moodle_course_id`, `hash`, `json_information`, `created_at`, `updated_at`)
                                        VALUES (NULL, ? , ?, ?, ? , '".date("Y-m-d H:i:s",time())."','".date("Y-m-d H:i:s",time())."')",
            [$data["moodle_user_id"],$data["moodle_course_id"],$hash,$json]
        );
        return   redirect("/certificate_pdf/".$hash);
    }
}
