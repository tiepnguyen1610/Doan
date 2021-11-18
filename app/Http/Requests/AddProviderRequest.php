<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProviderRequest extends FormRequest
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
            'txtName'   => 'required',
            'txtAddress'=>'required',
            'txtPhone'  => 'required'
        ];
    }

    public function messages()
    {
        return [

            'txtName.required' => 'Tên không được để trống',
            'txtAddress.required' => 'Trường không được để trống',
            'txtPhone.required' => 'Trường không được để trống'
        ];
    }
}
