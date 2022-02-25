<?php

namespace App\Http\Controllers\dashboard\reports;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Models\Course;
use App\Models\PackagesReport;
use App\Models\Report;
use App\query_builder\sort\SortCourseName;
use App\query_builder\table\Column;
use App\query_builder\table\Table;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class ReportsPackagesController extends BaseDashboardController
{

    public function index(){
    $table=Table::init("/dashboard/reports?1=1")
        ->addColumn(Column::init("شناسه گزارش	","id")->setSearch())
        ->addColumn(Column::init("شناسه کاربر در مودل","user.moodle_id")->setSearch())
        ->addColumn(Column::init("نام خریدار","user.first_name")->setSearch())
        ->addColumn(Column::init("نام خانوادگی خریدار","user.last_name")->setSearch())
        ->addColumn(Column::init("نام  پکیج ","package.name"))
        ->addColumn(Column::init("لیست درس ها","reportable")->setCallback(function(PackagesReport  $report){

            foreach ($report->courses as $course){
                $courses_names[]=$course->name;
            }
            return "<small>".implode("</br>",$courses_names)."</small>";
        }))
        ->addColumn(Column::init("تاریخ خرید","created_at")->setSearch("created_at"))
        ->addColumn(Column::init("مبلغ","price")->setSearch("price")->setCallback(fn($data)=>(number_format($data->price/10)." تومان")))
        ->addColumn(Column::init("شماره فاکتور","payment_code")->setSearch("payment_code"));

        $data = QueryBuilder::for(PackagesReport::class)
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
