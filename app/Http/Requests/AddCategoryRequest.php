<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'txtCatname' =>'required|unique:categories,cat_name'
        ];
    }

    public function messages()
    {
        return [
            'txtCatname.required' => 'Tên danh mục không được để trống!',
            'txtCatname.unique' => 'Tên danh mục đã tồn tại!'
        ];
    }
}
