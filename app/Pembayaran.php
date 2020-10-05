<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = [
        'tgl_bayar',
        'bulan',
        'tahun',
        'jumlah_bayar',
        'murid_id',
        'petugas_id',
        'spp_id'
    ];

    public function murid()
    {
        return $this->belongsTo('App\Murid', 'murid_id');
    }

    public function spp()
    {
        return $this->belongsTo('App\Spp', 'spp_id');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'petugas_id');
    }
}
