<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporanModel extends Model
{
    protected $table = 'tb_uploadlaporanpkpm';

    protected $fillable = [
        'idUser', 'npm', 'nama', 'laporan', 'video',
    ];
}
