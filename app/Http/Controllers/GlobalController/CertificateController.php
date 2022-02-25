<?php

namespace App\Http\Controllers\GlobalController;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
class CertificateController extends Controller
{




    public function index($hash)
    {
        $certificate=Certificate::where("hash",$hash)->first();
        if (!$certificate)abort(404);
        return $this->makePdf($certificate);
    }
    public function index_html($hash)
    {

        $certificate=Certificate::where("hash",$hash)->first();
        if (!$certificate)abort(404);
        $json=json_decode($certificate->json_information);
        try {
           $data=$json->data;
            $course_name=$data->name_en_course;
            $user_name=$data->name_en;
        }catch (\Exception $e){
            $data=$json[0];
            $user_name=$data->user->en_name;
            $meta_data=unserialize($data->hq->instance->intro);
           $course_name= $meta_data["course_en_name"];
        }
        $certificate_id=$hash;
        return view("certificate/index",compact("certificate","course_name","user_name","certificate_id"));
    }

    protected function makePdf(Certificate $certificate){




        $generator=new \Omidzahed\Certificate\generatePdf(
                env("export_certificate_path"),
                __DIR__."/../../../../package/certificate/assets");
        $html=$this->setData($certificate);
        $name=$certificate->hash;
        $path_qr=storage_path("app/public/$name.png");
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data("http://panel.novinparsian.com/certificate_html/".$certificate->hash)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(400)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->build();

        $result->saveToFile($path_qr);
        $html=str_replace("{qr}",$path_qr,$html);


        if ( $generator->creatPdfFromHtml($html,$certificate->hash)){
            $data = file_get_contents(env("export_certificate_path")."/".$certificate->hash.".pdf");
            header("Content-type: application/pdf");
            echo $data;

        }
    }

    protected function replaceFaNumber($string){
        return str_replace(["1","2","3","4","5","6","7","8","9","0"],["۱","۲","۳","۴","۵","۶","۷","۸","۹","۰"],$string);
    }
    protected function setData(Certificate $certificate){
       $today_fa=$this->replaceFaNumber(\Morilog\Jalali\Jalalian::forge('today')->format('Y-m-d'));
       $today_en=Carbon::now()->format("Y-m-d");
       $html= file_get_contents(__DIR__."/../../../../package/certificate/template/certificate.html");
       $data=json_decode($certificate->json_information);
       if (isset($data->driver) and $data->driver=="form"){
       return $this->form_driver($html,$data,$today_fa,$today_en,$certificate);
       }else{
           return  $this->moodle_driver($html,$data,$today_fa,$today_en,$certificate);
       }

    }


    protected function moodle_driver($html,$data,$today_fa,$today_en,$certificate){
        $data=$data[0];
        $user_image_path=$this->saveUserImage($data->user,$certificate->hash);
        $meta_data=unserialize($data->hq->instance->intro);


        $br_date=$this->replaceFaNumber(\Morilog\Jalali\Jalalian::forge($data->user->br_date)->addDays(1)->format('Y-m-d'));
        $html=str_replace(
            [
                "{{user_fa_name}}",
                "{{user_en_name}}",
                "{{city_user}}",
                "{{br_date}}",
                "{{NationalCodeUser}}",

                "{{course_name}}",
                "{{course_en_name}}",
                "{{course_en_time}}",
                "{{course_fa_time}}",


                "{{fa_date}}",
                "{{en_date}}",
                "{{user_image_path}}"

            ],
            [
                $data->user->firstname ." ". $data->user->lastname,
                $data->user->en_name,
                $data->user->city_user,
                $br_date,
                $this->replaceFaNumber($data->user->NationalCodeUser),

                $data->course->fullname,
                $meta_data["course_en_name"]??"-",
                $meta_data["course_en_time"]??"-",
                $this->replaceFaNumber( $meta_data["course_fa_time"])??"-",
                $today_fa,
                $today_en,
                $user_image_path
            ]


            ,$html);
        return $html;
    }
    protected function form_driver($html,$data,$today_fa,$today_en,$certificate){
        $data=$data->data;
        $today_fa=$data->date_en??$today_fa;
        $today_en=$data->date_fa??$today_en;
        if ($data->image_file_local){
           $user_image_path= Storage::disk("public")->path($data->image_file_local);
        }else {
            $user_image_path=$this->saveUserImageFromUrl($data->user_image,$certificate->hash);
        }


        $html=str_replace(
            [
                "{{user_fa_name}}",
                "{{user_en_name}}",
                "{{city_user}}",
                "{{br_date}}",
                "{{NationalCodeUser}}",

                "{{course_name}}",
                "{{course_en_name}}",
                "{{course_en_time}}",
                "{{course_fa_time}}",


                "{{fa_date}}",
                "{{en_date}}",
                "{{user_image_path}}"

            ],
            [
                $data->name_fa ,
                $data->name_en ,
               $data->issued,
                $this->replaceFaNumber( $data->birthday,)??"-",
                $this->replaceFaNumber($data->national_code),
                $data->name_fa_course,
                $data->name_en_course,
                $data->course_duration_en,
                $this->replaceFaNumber( $data->course_duration_fa,)??"-",
                $today_fa,
                $today_en,
                $user_image_path
            ]


            ,$html);

        return $html;
    }

    protected function saveUserImage($USER,$hash){
        $image_path=env("export_certificate_path")."/images/".$hash.".png";
        $data=file_get_contents(env("moodle_website").$USER->image);
        if (file_put_contents( $image_path,$data))return $image_path;
    }

    protected function saveUserImageFromUrl($url,$hash){
        $image_path=env("export_certificate_path")."/images/".$hash.".png";
        $data=file_get_contents($url);
        if (file_put_contents( $image_path,$data))return $image_path;
    }
}
