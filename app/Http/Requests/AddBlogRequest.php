<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBlogRequest extends FormRequest
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
            'txtTitle'  => 'required',
            'imageBlog' => 'required|image:jpeg,jpg,png',
            'txtContent'=> 'required',
            'tags'      => 'required'
        ];
    }

    public function messages()
    {
        return [

            'txtTitle.required' => 'Tiêu đề không được để trống',
            'txtContent.required'  => 'Nội dung không được để trống',
            'tags.required'  => 'Trường này không được để trống',
            'imageBlog.required'  => 'File ảnh chưa được chọn',
            'imageBlog.image'  => 'File không đúng định dạng',
        ];
    }
}
