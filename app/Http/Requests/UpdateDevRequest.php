<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDevRequest extends FormRequest
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
            'email' => ['required', 'max:255', 'email', 'unique:App\Models\User,email,'.$this->id],
            'fullname' => ['required', 'max:255'],
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\User,phone,'.$this->id],
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'password' => ['max:255'],
            'password2' => 'same:password'
        ];
    }

    public function attributes(){
        return [
            'email' => 'Email',
            'fullname' => 'Họ và tên',
            'phone' => 'Số điện thoại',
            'avatar' => 'Ảnh đại diện',
            'password' => 'Mật khẩu',
            'password2' => 'Xác nhận mật khẩu'
        ];
    }

    public function messages(){
        return [
            'email.required' => ':attribute không được để trống', 
            'email.max' => ':attribute không được quá 255 ký tự', 
            'email.email' => ':attribute không đúng định dạng', 
            'email.unique' => ':attribute Này đã có người sử dụng', 
            'fullname.required' => ':attribute không được để trống', 
            'fullname.max' => ':attribute không được quá 255 ký tự', 
            'phone.required' => ':attribute không được để trống', 
            'phone.regex' => ':attribute không đúng định dạng', 
            'avatar.image' => ':attribute không phải là hình ảnh',
            'avatar.mimes' => ':attribute không đúng định dạng',
            'phone.unique' => ':attribute đã có người sử dụng', 
            'password.max' => ':attribute không được quá 255 ký tự', 
            'password2.same' => ':attribute không trùng khớp', 
        ];
    }
}
