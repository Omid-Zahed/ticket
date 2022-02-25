<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class certificate_form extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "moodle_user_id"=>"required",
            "moodle_course_id"=>"required",
            "user_image"=>"string",
            "name_fa"=>"required",
            "name_en"=>"required",
            "national_code"=>"required",
            "issued"=>"required",
            "birthday"=>"required",
            "name_fa_course"=>"required",
            "name_en_course"=>"required",
            "course_duration_fa"=>"required",
            "course_duration_en"=>"required",
        ];
    }
}
