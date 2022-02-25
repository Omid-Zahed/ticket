<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodleUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'moodle_id',
        'first_name',
        'last_name'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withTimestamps();
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}
