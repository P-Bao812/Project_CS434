<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class TaiKhoanCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'emaildangnhap'=> ['required', 'email', 'max:255', 'unique:taikhoans'],
            'manguoidung'  => ['required', 'integer', 'exists:nguoi_dungs,id'],
            'password'     => ['required', 'string', 'min: 6'],
            'trangthai'    => ['required', 'integer', 'in:0,1'],
            'lannhapcuoi'  => ['required', 'date_format:Y-m-d H:i'],
        ];
    }
    #[Override]
    public function messages()
    {
        return [
            'emaildangnhap.unique' => 'Email tồn tại',
            'matkhau.min'  => 'mật khẩu ít nhất 6 ký tự',
        ];
    }
}
