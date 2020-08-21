<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class observasiModel extends Model
{
    protected $table = 'tb_formObservasi';

    protected $fillable = ['idUser', 'namaFile', 'file'];
}
