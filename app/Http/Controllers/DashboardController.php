<?php

namespace App\Http\Controllers;

use App\Spp;
use App\Murid;
use App\Petugas;
use App\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::count();
        $murid = Murid::count();
        $pembayaran = Pembayaran::count();
        $spp = Spp::count();
        return view('admin.dashboard.index', compact('petugas','murid','pembayaran','spp'));
    }
}
