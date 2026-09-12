<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonAnDaLuu extends Model
{
    protected $table = 'mon_an_da_luus';
    protected $fillable = [
        'manguoidung',
        'mamonan',
        'ngayluu'
    ];
}
