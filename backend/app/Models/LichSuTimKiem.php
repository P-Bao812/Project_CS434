<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichSuTimKiem extends Model
{
    protected $table = 'lich_su_tim_kiems';
    protected $fillable = [
        'manguoidung',
        'tukhoatimkiem',
        'thoigiantimkiem'
    ];
}
