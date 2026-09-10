<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguyenLieu extends Model
{
    protected $table = 'nguyen_lieus';
    protected $fillable = [
        'tengnuyenlieu',
        'donvitinh',
        'ghichu',
    ];
}
