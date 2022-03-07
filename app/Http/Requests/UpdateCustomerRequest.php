<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckUser;

class UpdateCustomerRequest extends FormRequest
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
            'id' => ['required', new CheckUser],
            'email' => ['required', 'nullable', 'max:255', 'email', 'unique:App\Models\User,email,'.$this->id],
            'fullname' => ['required', 'max:255'],
            'address' => ['required'],
            'password' => ['max:255', 'confirmed']
        ];
    }

    public function attributes(){
        return [
            'id' => 'Mã người dùng',
            'fullname' => 'Họ và tên',
            'password' => 'Mật khẩu',
            'email' => 'Email',
        ];
    }

    public function messages(){
        return [
            'id.required' => 'Vui lòng nhập :attribute',
            'email.required' => ':attribute không được để trống', 
            'email.max' => ':attribute không được quá 255 ký tự', 
            'email.email' => ':attribute không đúng định dạng', 
            'email.unique' => ':attribute Này đã có người sử dụng', 
            'fullname.required' => ':attribute không được để trống', 
            'fullname.max' => ':attribute không được quá 255 ký tự', 
            'password.required' => ':attribute không được để trống', 
            'password.confirmed' => ':attribute không trùng khớp'
        ];
    }
}
