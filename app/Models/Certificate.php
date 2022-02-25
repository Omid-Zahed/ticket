<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property  $moodle_user_id
 * @property  $moodle_course_id
 * @property  $hash
 * @property  $json_information
 */
class Certificate extends Model
{
    use HasFactory;

    protected $fillable=[
        "moodle_user_id",
        "moodle_course_id",
        "hash",
        "json_information",
    ];

    public function moodle_user()
    {
        return $this->belongsTo(MoodleUser::class);
    }
    public function courses()
    {
        return $this->belongsTo(Course::class,"moodle_course_id","id");

    }
}
