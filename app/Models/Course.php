<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'moodle_id',
        'name',
        'tag'
    ];
    public static $name="درس";

    public function moodle_users()
    {
        return $this->belongsToMany(MoodleUser::class)
            ->withTimestamps();
    }

    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }
}
