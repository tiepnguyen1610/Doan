<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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

            'txtProname' => 'required|unique:products,pro_name', 
            'chbSize' => 'required',
            'chbColor' => 'required',
            'txtSalePrice' => 'required',
            'imagePro' => 'required|image:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [

            'txtProname.required' => 'Tên không được để trống',
            'txtProname.unique' => 'Tên không được phép trùng',
            'chbSize.required'  => 'Trường này không được để trống',
            'chbColor.required'  => 'Trường này không được để trống',
            'txtSalePrice.required'  => 'Giá không được để trống',
            'imagePro.required'  => 'File ảnh chưa được chọn',
            'imagePro.image'  => 'File không đúng định dạng',
        ];
    }
}
