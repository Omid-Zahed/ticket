<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'moodle_user_id',
        'payment_code',
        'date'
    ];
    protected $appends=["reportableAbleType"];

    public function reportable()
    {
        return $this->morphTo();
    }


    public function moodle_user()
    {
        return $this->belongsTo(MoodleUser::class);
    }

    /**
     * @param Builder $query
     * @param $date
     * @return Builder
     */
    public function scopeCourseName( $query, $date)
    {
        return  $query->select("reports.*","courses.name as actual_column_curse")->where("reportable_type","=","App\Models\Course")->where('courses.name', 'LIKE', '%' . $date . '%')->join('courses', 'reports.reportable_id', '=', 'courses.id');

    }
    public function scopeCourseTag( $query, $date)
    {
        return  $query->select("reports.*","courses.name as actual_column_curse")->where("reportable_type","=","App\Models\Course")->where('courses.tag', 'LIKE', '%' . $date . '%')->join('courses', 'reports.reportable_id', '=', 'courses.id');

    }

    public function getReportableAbleTypeAttribute(){
        return $this->reportable::$name;
    }
}
