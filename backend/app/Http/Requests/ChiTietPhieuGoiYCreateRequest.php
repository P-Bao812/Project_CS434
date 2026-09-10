<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ChiTietPhieuGoiYCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mamonan' => ['required', 'integer', 'exists:mon_ans,id'],
            'maphieugoiy' => ['required', 'integer', 'exists:phieu_goi_y_s,id'],
            'dophuhop' => ['required', 'integer'],
            'lydogoiy' => ['required', 'string', 'max:255'],
            'thutuhienthi' => ['required', 'integer'],
            'songuyelieucosan' => ['required', 'integer'],
            'tongnguyenlieucan' => ['required', 'integer'],
            'tylephuhop' => ['required', 'integer'],
        ];
    }
}
