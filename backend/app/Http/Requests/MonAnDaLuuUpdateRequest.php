<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MonAnDaLuuUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:mon_an_da_luus,id'],
            'manguoidung' => ['required', 'integer', 'exists:nguoi_dungs,id'],
            'mamonan' => ['required', 'integer', 'exists:mon_ans,id'],
            'ngayluu' => ['required', 'date_format:Y-m-d'],
        ];
    }
}
