<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property string $name
 * @property string $model_id
 */
class packages extends Model
{
    use HasFactory;


    public function courses(){
        return $this->belongsToMany(Course::class,"course_packages");
    }
}
