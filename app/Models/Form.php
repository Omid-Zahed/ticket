<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @property $data
 * @property $type
 * @property $translate
 * @property $json_data
 * @property $c_1
 * @property $c_2
 * @property $c_3
 * @property $c_4
 * @property $c_5
 * @property $c_6
 * @property $c_7
 */
class Form extends Model
{
    use HasFactory;


      static function save_from_model_request(Request  $request): Form
      {
          $form=new Form();
          $form->type=$request->type;
          $form->data=$request->data;
          $form->translate=$request->translate;
          $form->save();
          return $form;
    }


    function setDataAttribute($value){
          $this->attributes['data']=serialize($value);
        switch (trim($this->type)):
            case "درخواست همکاری اساتید":
                $this->c_1=$this->data["user_name"];
                $this->c_2=$this->data["national_code"];

                //موارد تدریس
                $this->c_3=$this->data["Teaching_items"];

                //رشته مورد نظر
                $this->c_4=$this->data["field"];
                break;

        endswitch;

    }
    function setTranslateAttribute($value)
    {
        $this->attributes['translate'] = serialize($value);
    }

     function  getDataAttribute(){
         return unserialize($this->attributes['data']);
     }

    public function getTranslateAttribute(){
        return unserialize($this->attributes['translate']);
    }

}
