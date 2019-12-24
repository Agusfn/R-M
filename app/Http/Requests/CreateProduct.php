<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
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
            "code" => "nullable|unique:products,code",
            "ordered_img_ids" => "required|json",
            "name" => "required",
            "category_id" => "required|integer|exists:categories,id",
            "subcategory_id" => "nullable|integer|exists:subcategories,id",
            "description" => "required"
        ];
    }
}
