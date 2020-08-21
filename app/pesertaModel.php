<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesertaModel extends Model
{
    protected $table = 'tb_pesertapkpm';

    protected $fillable =
    [
        'idUser',
        'nama',
        'npm',
        'jurusan',
        'pembayaranPKPM',
        'pembayaranBPP',
        'transkripKRS',
        'transkripNilai',
        'nomorHP',
        'ukuranKaos',
        'status'
    ];
}
