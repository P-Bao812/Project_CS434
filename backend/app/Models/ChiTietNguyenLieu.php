<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietNguyenLieu extends Model
{
    protected $table =  'chi_tiet_nguyen_lieus';
    protected $fillable = [
        'mamonan',
        'manguyenlieu',
        'soluong',
        'donvitinh'
    ];
}
