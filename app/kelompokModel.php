<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelompokModel extends Model
{
    protected $table = 'tb_kelompok';

    protected $fillable = ['nameKelompok', 'dpl', 'namaTempat'];
}
