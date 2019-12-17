<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFeaturedItem extends FormRequest
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
            "title" => "max:65",
            "image_type" => "in:upload,url",
            "image_file" => "required_if:image_type,upload|image|max:5120",
            "image_url" => "required_if:image_type,url|max:250",
            "action_btn_text" => "required_with:show_action_btn",
            "action_btn_url" => "required_with:show_action_btn"
        ];
    }
}
