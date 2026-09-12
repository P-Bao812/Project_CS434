<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LichSuCamXucCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'manguoidung' => ['required', 'integer', 'exists:nguoi_dungs,id'],
            'macamxuc' => ['required', 'integer', 'exists:cam_xucs,id'],
            'thoigianchon' => ['required', 'date_format:H:i:s'],
            'ghichu' => ['nullable', 'string', 'max:100'],
        ];
    }
}
