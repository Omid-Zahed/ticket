<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 * @property int $id
 * @property int $user_id
 * @property int $package_id
 * @property float $price
 * @property string $payment_code
 *
 *
 */
class PackagesReport extends Model
{
    use HasFactory;

    protected $with=["package","user","courses"];

    public function user(){
        return $this->hasOne(MoodleUser::class,"id","user_id");
    }
    public function package(){
        return $this->hasOne(packages::class,"id","package_id");
    }
    public function courses(){
        return $this->belongsToMany(Course::class,"course_packages_report","packages_reports_id","course_id");
    }
}
