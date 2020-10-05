<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = 'spp';

    protected $fillable = [
        'tahun', 'nominal'
    ];
}
