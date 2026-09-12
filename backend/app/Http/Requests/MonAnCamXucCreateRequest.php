<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MonAnCamXucCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'macamxuc' => ['required', 'integer', 'exists:cam_xucs,id'],
            'mamonan' => ['required', 'integer', 'exists:mon_ans,id'],
            'mucdophuhop' => ['required', 'integer'],
            'ghichu' => ['nullable', 'string', 'max:100'],
        ];
    }
}
