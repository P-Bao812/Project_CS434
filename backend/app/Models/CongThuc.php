<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CongThuc extends Model
{
    protected $table = 'cong_thucs';
    protected $fillable = [
        'mamonan',
        'huongdannau',
        'ghichu'
    ];
}
