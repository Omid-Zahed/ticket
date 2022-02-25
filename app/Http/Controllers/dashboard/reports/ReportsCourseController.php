<?php

namespace App\Http\Controllers\dashboard\reports;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Models\Course;
use App\Models\Report;
use App\query_builder\sort\SortCourseName;
use App\query_builder\table\Column;
use App\query_builder\table\Table;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class ReportsCourseController extends BaseDashboardController
{

    public function index(){

    $table=Table::init("/dashboard/reports?1=1")
        ->addColumn(Column::init("شناسه گزارش	","id")->setSearch())
        ->addColumn(Column::init("شناسه کاربر در مودل","moodle_user_id")->setSearch())
        ->addColumn(Column::init("نام خریدار","moodle_user.first_name")->setSearch())
        ->addColumn(Column::init("نام خانوادگی خریدار","moodle_user.last_name")->setSearch())
        ->addColumn(Column::init("نوع محصول ","reportableAbleType"))
        ->addColumn(Column::init("دسته","reportable.tag"))
        ->addColumn(Column::init("نام محصول","reportable.name"))
        ->addColumn(Column::init("تاریخ خرید","date")->setSearch("date"))
        ->addColumn(Column::init("مبلغ","price")->setSearch("price")->setCallback(fn($data)=>(number_format($data->price/10)." تومان")))
        ->addColumn(Column::init("شماره فاکتور","payment_code")->setSearch("payment_code"))
        ->addSearch("course_name","نام درس")
        ->addSearch("course_tag","دسته")
;

        $data = QueryBuilder::for(Report::class)
            ->with("reportable")
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

}
