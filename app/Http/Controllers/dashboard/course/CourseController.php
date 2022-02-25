<?php

namespace App\Http\Controllers\dashboard\course;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Models\Course;
use App\Models\Report;
use App\query_builder\sort\SortCourseName;
use App\query_builder\table\Column;
use App\query_builder\table\Table;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class CourseController extends BaseDashboardController
{

    public function index(){
        $table=Table::init("/dashboard/course?1=1")
            ->addColumn(Column::init("شناسه 	","id")->setSearch())
            ->addColumn(Column::init("شناسه درس در مودل","moodle_id")->setSearch())
            ->addColumn(Column::init("نام درس","name")->setSearch())
            ->addColumn(Column::init("نوع درس","tag")->setSearch())
            ->addColumn(Column::init("تعداد دانشجو","id")->setSearch()->setCallback(fn($data)=>count($data->moodle_users)))
            ->addColumn(Column::init("تاریخ ایجاد","created_at")->setSearch())
        ;

        $data = QueryBuilder::for(Course::class)

            ->with(["moodle_users"=>function(BelongsToMany $query){
                $query->select("id");
            }])
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
