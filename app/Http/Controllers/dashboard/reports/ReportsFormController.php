<?php

namespace App\Http\Controllers\dashboard\reports;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Http\Requests\certificate_form;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Form;
use App\Models\Report;
use App\query_builder\sort\SortCourseName;
use App\query_builder\table\Column;
use App\query_builder\table\Table;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class ReportsFormController extends BaseDashboardController
{

    public function index($type){
        switch ($type):
            case "درخواست همکاری اساتید":
            list($data,$table)= $this->index_teacher_list($type);
           break;
          default:
           list($data,$table)= $this->index_default($type);
          break;

        endswitch;

        return view("dashboard.queryBuilder.table",compact('data',"table"));
    }
    protected function index_default($type): array
    {
        $table=Table::init("/dashboard/reports/form/list?1=1")
            ->addColumn(Column::init("شناسه گزارش	","id")->setSearch())
            ->addColumn(Column::init(" نوع ","type"))
            ->addColumn(Column::init(" تاریخ ایجاد ","created_at"))
            ->addColumn(Column::init("-","id")->setCallback(function ($data){

                return "<a href='".route("dashboard.reports.from.show",$data->id)."'>مشاهده</a>";
            }))
        ;
        $data = QueryBuilder::for(Form::class)
            ->where("type",$type)
            ->allowedFilters([
                "id",
                "date"
            ])
            ->paginate(30)->withQueryString();;

            return [$data,$table];
    }
    public function index_teacher_list($type): array
    {


//        $this->c_1=$this->data["user_name"];
//        $this->c_2=$this->data["national_code"];
//
//        //موارد تدریس
//        $this->c_3=$this->data["Teaching_items"];
//
//        //رشته مورد نظر
//        $this->c_4=$this->data["field"];


        $table=Table::init("/dashboard/reports/form/list/$type/?1=1")
            ->addColumn(Column::init("شناسه گزارش	","id")->setSearch())
            ->addColumn(Column::init(" نام استاد ","c_1")->setSearch("c_1"))
            ->addColumn(Column::init(" کد ملی","c_2")->setSearch("c_2"))
            ->addColumn(Column::init(" موارد تدریس ","c_3")->setSearch("c_3"))
            ->addColumn(Column::init(" رشته مورد نظر ","c_4")->setSearch("c_4"))
            ->addColumn(Column::init(" نوع ","type"))
            ->addColumn(Column::init(" تاریخ ایجاد ","created_at"))
            ->addColumn(Column::init("-","id")->setCallback(function ($data){

                return "<a href='".route("dashboard.reports.from.show",$data->id)."'>مشاهده</a>";
            }));



        $data = QueryBuilder::for(Form::class)
            ->where("type",$type)
            ->allowedFilters([
                "id",
                "date",
                "c_1",
                "c_2",
                "c_3",
                "c_4",
                "c_5",
            ])
            ->paginate(30)->withQueryString();;

        return [$data,$table];
    }


    public function show(Form  $form){
       return view("dashboard.reports.form.show",compact('form'));
    }

}
