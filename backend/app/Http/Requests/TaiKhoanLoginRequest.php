<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class TaiKhoanLoginRequest extends FormRequest
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
            'emaildangnhap' => ['required','email'],
            'password'       => ['required','string','min:6']
        ];
    }
     #[Override]
    public function messages()
    {
        return[
            'emaildangnhap.required'=>'Đăng nhập thất bại',
        ];
    }
}
