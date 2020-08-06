<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beritaModel extends Model
{
    protected $table = 'tb_beritapkpm';

    protected $fillable = ['idUser', 'namaBerita', 'file'];
}
