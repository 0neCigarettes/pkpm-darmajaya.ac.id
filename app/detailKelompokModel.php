<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailKelompokModel extends Model
{
    protected $table = 'tb_detail_kelompok';

    protected $fillable = ['idKelompok', 'idPeserta'];
}
