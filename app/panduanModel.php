<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class panduanModel extends Model
{
    protected $table = 'tb_panduanpkpm';

    protected $fillable = ['idUser', 'namaFile', 'file'];
}
