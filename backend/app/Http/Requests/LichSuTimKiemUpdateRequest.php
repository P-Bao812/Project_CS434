<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LichSuTimKiemUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:lich_su_tim_kiems,id'],
            'manguoidung' => ['required', 'integer', 'exists:nguoi_dungs,id'],
            'tukhoatimkiem' => ['required', 'string', 'max:100'],
            'thoigiantimkiem' => ['required', 'date_format:H:i:s'],
        ];
    }
}
