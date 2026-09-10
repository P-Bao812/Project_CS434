<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DanhGiaCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mamonan' => ['required', 'integer', 'exists:mon_ans,id'],
            'manguoidung' => ['required', 'integer', 'exists:nguoi_dungs,id'],
            'sosao' => ['required', 'integer', 'min:1', 'max:5'],
            'binhluan' => ['required', 'string', 'max:255'],
            'ngaydanhgia' => ['required', 'date_format:Y-m-d'],
        ];
    }
}
