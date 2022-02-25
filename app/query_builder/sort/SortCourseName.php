<?php

namespace App\query_builder\sort;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class SortCourseName implements Sort
{

    public function __invoke(Builder $query, bool $descending, string $property)
    {

        $direction = $descending ? 'DESC' : 'ASC';
        if ($property=="reports"){
            $query->select("reports.*","courses.name as actual_column_curse")->where("reportable_type","=","App\Models\Course")->join('courses', 'reports.reportable_id', '=', 'courses.id');
            $query->orderByRaw("actual_column_curse {$direction}");
        }
        return $query;


    }
}
