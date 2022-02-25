<?php

namespace App\Http\Controllers\dashboard\students;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Models\Course;
use App\Models\MoodleUser;
use App\Models\Report;
use App\query_builder\sort\SortCourseName;
use App\query_builder\table\Column;
use App\query_builder\table\Table;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class StudentsController extends BaseDashboardController
{

    public function index(){
        $table=Table::init("/dashboard/students?1=1")
            ->addColumn(Column::init("شناسه 	","id")->setSearch())
            ->addColumn(Column::init("شناسه کاربر در مودل در مودل","moodle_id")->setSearch())
            ->addColumn(Column::init("نام ","first_name")->setSearch())
            ->addColumn(Column::init("نام خانوادگی ","last_name")->setSearch())
            ->addColumn(Column::init("تعداد درس ","id")->setSearch()->setCallback(fn($data)=>count($data->courses)))
            ->addColumn(Column::init("تاریخ ایجاد","created_at")->setSearch())
        ;

        $data = QueryBuilder::for(MoodleUser::class)
            ->with(["courses"=>function(BelongsToMany $query){
                $query->select("id");
            }])
            ->allowedFilters([
                "id",
                "moodle_id",
                "first_name",
                "last_name",
                "created_at",
            ])
            ->paginate(30)->withQueryString();;

        return view("dashboard.queryBuilder.table",compact('data',"table"));
    }

}
