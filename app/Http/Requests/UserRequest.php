<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        switch($this->method()) {
            case 'POST': // Tạo mới
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:8'
                ];
            
            case 'PUT': // Cập nhật
                return [
                    'name' => 'sometimes|string|max:255',
                    'email' => 'sometimes|email|unique:users,email,' . $this->id,
                    'password' => 'sometimes|min:8'
                ];
        }
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'email.unique' => 'Email đã tồn tại',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự'
        ];
    }
}