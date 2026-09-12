<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    protected $table = 'mon_ans';
    protected $fillable = [
        'madanhmuc',
        'tenmonan',
        'mota',
        'hinhanh',
        'dokho',
        'thoigiannau',
        'khauphanan'
    ];
}
