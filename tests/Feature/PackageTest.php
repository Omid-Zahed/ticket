<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\MoodleUser;
use App\Models\packages;
use App\Models\PackagesReport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PackageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testPackageReport(){
        $this->create_course();
        $this->create_user_moodle();
        $this->create_package();
        $this->createPackageReports();
        $this->assertTrue(true);

    }


    protected function create_user_moodle(){
        $u=new MoodleUser();
        $u->first_name="test";
        $u->last_name="test";
        $u->moodle_id=1;
        $u->save();

    }
    protected function create_course(){
        $c=new Course();
        $c->name="course test ";
        $c->moodle_id=1;
        $c->save();
    }
    protected function create_package(){
        $p=new packages();
        $p->name="package test";
        $p->model_id=1;
        $p->save();
        $p->courses()->attach(1);
    }


    protected function createPackageReports(){
        $p=new PackagesReport();
        //	id	user_id	package_id	price	payment_code	created_at	updated_at
        $p->user_id=1;
        $p->package_id=1;
        $p->price=1;
        $p->payment_code="123123";
        $p->save();
    }
}
