<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'api_id' => ['required'],
            'email' => ['nullable', 'max:255', 'email', 'unique:App\Models\User,email'],
            'fullname' => ['required', 'max:255'],
            'phone' => ['required', 'unique:App\Models\User,phone'],
        ];
    }

    public function attributes(){
        return [
            'api_id' => 'ID hệ thống',
            'fullname' => 'Họ và tên',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
        ];
    }

    public function messages(){
        return [
            'email.max' => ':attribute không được quá 255 ký tự', 
            'email.email' => ':attribute không đúng định dạng', 
            'email.unique' => ':attribute Này đã có người sử dụng', 
            'fullname.required' => ':attribute không được để trống', 
            'fullname.max' => ':attribute không được quá 255 ký tự', 
            'phone.required' => ':attribute không được để trống', 
            'phone.unique' => ':attribute đã có người sử dụng'
        ];
    }
}
