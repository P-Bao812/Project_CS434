<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MonAnDaLuuCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'manguoidung' => ['required', 'integer', 'exists:nguoi_dungs,id'],
            'mamonan' => ['required', 'integer', 'exists:mon_ans,id'],
            'ngayluu' => ['required', 'date_format:Y-m-d'],
        ];
    }
}
