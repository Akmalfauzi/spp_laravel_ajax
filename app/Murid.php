<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';

    protected $fillable = [
        'nisn',
        'nis',
        'nama_murid',
        'alamat',
        'no_telp',
        'user_id',
        'spp_id',
        'kelas_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function spp()
    {
        return $this->belongsTo('App\Spp', 'spp_id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
}
