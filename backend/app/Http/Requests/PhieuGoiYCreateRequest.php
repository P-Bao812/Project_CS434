<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PhieuGoiYCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'manguoidung' => ['required', 'integer', 'exists:nguoi_dungs,id'],
            'ngaytao' => ['required', 'date_format:Y-m-d'],
            'ghichu' => ['nullable', 'string', 'max:255'],
        ];
    }
}
