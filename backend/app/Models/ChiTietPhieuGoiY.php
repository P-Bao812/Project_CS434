<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuGoiY extends Model
{
    protected $table = 'chi_tiet_phieu_goi_y_s';
    protected $fillable = [
        'mamonan',
        'maphieugoiy',
        'dophuhop',
        'lydogoiy',
        'thutuhienthi',
        'songuyelieucosan',
        'tongnguyenlieucan',
        'tylephuhop',
    ];
}
