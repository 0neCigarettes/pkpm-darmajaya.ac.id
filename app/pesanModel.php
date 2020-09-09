<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanModel extends Model
{
    protected $table = 'tb_pesan';

    protected $fillable = [
        'pengirim', 'penerima', 'pesan',
    ];
}
