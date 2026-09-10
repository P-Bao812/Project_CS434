<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PhieuGoiYUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:phieu_goi_y_s,id'],
            'manguoidung' => ['required', 'integer', 'exists:nguoi_dungs,id'],
            'ngaytao' => ['required', 'date_format:Y-m-d'],
            'ghichu' => ['nullable', 'string', 'max:255'],
        ];
    }
}
