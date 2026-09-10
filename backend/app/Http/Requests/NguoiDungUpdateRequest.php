<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NguoiDungUpdateRequest extends FormRequest
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
            'id'           => ['required', 'exists:nguoi_dungs,id'],
            'hoten'        => ['required', 'string', "max:100"],
            'tenhienthi'   => ['required', 'string', "max:100", 'nullable'],
            'gioithieungan' => ['required', 'string', "max:100", 'nullable'],
            'emaillienhe'  => ['required', 'string', "max:100", 'nullable'],
            'sodienthoai'  => ['required', 'string', 'max:13'],
            'ngaysinh'     => ['required', 'date_format:Y-m-d'],
            'diachi'       => ['required', 'string', 'max:225'],
            'anhdaidien'   => ['required', 'string', 'max:225']
        ];
    }
}
    