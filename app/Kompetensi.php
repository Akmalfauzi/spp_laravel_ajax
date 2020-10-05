<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    protected $table = 'kompetensi_keahlian';

    protected $fillable = [
        'nama_kompetensi'
    ];
}
