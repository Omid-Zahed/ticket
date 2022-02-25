<?php

namespace App\Http\Controllers\dashboard\packages;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Models\Course;
use App\Models\packages;
use App\Models\PackagesReport;
use App\Models\Report;
use App\query_builder\sort\SortCourseName;
use App\query_builder\table\Column;
use App\query_builder\table\Table;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class PackagesController extends BaseDashboardController
{

    public function index(){
        $table=Table::init("/dashboard/course?1=1")
            ->addColumn(Column::init("شناسه 	","id")->setSearch())
            ->addColumn(Column::init("شناسه درس در مودل","model_id")->setSearch())
            ->addColumn(Column::init("نام درس","name")->setSearch())
            ->addColumn(Column::init("لیست درس ها","reportable")->setCallback(function(  $report){

                foreach ($report->courses as $course){
                    $courses_names[]=$course->name;
                }
                return "<small>".implode("</br>",$courses_names)."</small>";
            }))
//            ->addColumn(Column::init("نوع درس","tag")->setSearch())
//            ->addColumn(Column::init("تعداد دانشجو","id")->setSearch()->setCallback(fn($data)=>count($data->moodle_users)))
//            ->addColumn(Column::init("تاریخ ایجاد","created_at")->setSearch())
        ;

        $data = QueryBuilder::for(packages::class)
            ->with(['courses'])
            ->allowedFilters([
                "id",
                "moodle_id",
                "name",
                "tag",
                "created_at"
            ])
            ->paginate(30)->withQueryString();;


        return view("dashboard.queryBuilder.table",compact('data',"table"));
    }

}
