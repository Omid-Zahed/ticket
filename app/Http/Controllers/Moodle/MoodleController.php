<?php

namespace App\Http\Controllers\Moodle;

use App\Http\Controllers\dashboard\BaseDashboardController;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Form;
use App\Models\MoodleUser;
use App\Models\packages;
use App\Models\PackagesReport;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MoodleController extends BaseDashboardController
{


    protected function findOrCreatePackage($name,$moodle_id,$courses){
        $p=packages::where("model_id","=",$moodle_id)->get()[0]??null;
        if ($p)return $p;
        $p=new packages();
        $p->name=$name;
        $p->model_id=$moodle_id;
        $p->save();
        foreach ($courses as $course){
            $p->courses()->attach($course);
        }
        return $p;
    }
    public function importPackagePayments(Request  $request){


        $user=$this->getOrCreateUser(
            $request["user"]["id"],
            $request["user"]["firstname"],
            $request["user"]["lastname"],
        );
        $package_name=$request["package"]["instance"]["package_information"]["name"];
        $package_moodle_id=$request["package"]["course_id"];


       $courses=[];
        foreach ($request["all_course"] as $course) {
            $id=$course["course"]["value"];
            $name=$course["course"]["text"];
            $courses[]=$this->getOrCreateCourse($id,$name,"");
        }
        $package=$this->findOrCreatePackage($package_name,$package_moodle_id,$courses);


        $packageReport=new PackagesReport();
        $packageReport->payment_code=$request["tref"];
        $packageReport->user_id=$user->id;
        $packageReport->package_id=$package->id;
        $packageReport->price=$request["paid"];
        $packageReport->save();
        foreach ($request["course_ids"] as $cid){
            $course=Course::where("moodle_id","=",$cid)->get()[0]??null;
            if ($course){
                $packageReport->courses()->attach($course);
            }
        }

        return $packageReport;




        dd($request->all());
    }
    public function create(Request $request){

        //request validation
        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'course_object' => 'required',
            'data' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed'], 422);
        }

        //create new moodle user if not exists
        $moodle_user = MoodleUser::where('moodle_id', '=', $request['user']['id'])->first();
        if ($moodle_user === null) {
            $moodle_user = MoodleUser::create([
                'moodle_id' => $request['user']['id'],
                'first_name' => $request['user']['firstname'],
                'last_name' => $request['user']['lastname'],
            ]);
        }

        //create new course if not exists
        $course = Course::where('moodle_id', '=', $request['course_object']['id'])->first();
        if ($course === null) {
            $course = Course::create([
                'moodle_id' => $request['course_object']['id'],
                'name' => $request['course_object']['fullname'],
                "tag"=>$request["course_model"]["tag_name"]??null
            ]);
        }

        //attach course to user
        $moodle_user->courses()->attach($course);

        //create new report
        $report = new Report;
        $report->price = $request['data'][1]['Amount'];
        $report->moodle_user_id = $moodle_user->id;
        $report->payment_code = $request['data'][1]['InvoiceNumber'];
        $report->date = $request['data'][1]['InvoiceDate'];
        $course->reports()->save($report);

        return $report;
    }

    public function makeCertificate(Request  $request){
       $user= $this->getOrCreateUser(
            $request["user"]["id"],
            $request["user"]["firstname"],
            $request["user"]["lastname"],
           );
       $course= $this->getOrCreateCourse($request["course"]["id"],$request["course"]["fullname"],$request["course"]["tag"]??null);
       $req_json=json_encode([$request->all(),time()]);
       $certificate=new Certificate(
           [
               "moodle_user_id"=>$user->id,
               "moodle_course_id"=>$course->id,
               "hash"=>hash("sha256",$req_json),
               "json_information"=>$req_json,
           ]
       );
       $certificate->save();
       return $certificate;





    }

    protected function getOrCreateUser($id,$firstName,$lastName){
        $moodle_user = MoodleUser::where('moodle_id', '=', $id)->first();
        if ($moodle_user === null) {
            $moodle_user = MoodleUser::create([
                'moodle_id' => $id,
                'first_name' => $firstName,
                'last_name' => $lastName,
            ]);

        }
        return $moodle_user;
    }

    protected function getOrCreateCourse($id,$fullname,$tag_name){
        $course = Course::where('moodle_id', '=', $id)->first();
        if ($course === null) {
            $course = Course::create([
                'moodle_id' => $id,
                'name' =>$fullname,
                "tag"=>$tag_name??null
            ]);
        }
        return $course;
    }
    public function saveForm(Request  $request){


        return   Form::save_from_model_request($request);
    }

}
