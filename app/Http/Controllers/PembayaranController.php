<?php

namespace App\Http\Controllers;

use App\Spp;
use App\Murid;
use App\Pembayaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\PembayaranRequest;
use App\Petugas;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $pembayaran = Pembayaran::with(['murid','murid.kelas','petugas','spp'])->get();
            return DataTables::of($pembayaran)
            ->addIndexColumn()
            ->make(true);
        }

        $murid = Murid::all();
        $spp = Spp::all();
        return view('admin.pembayaran.index', compact('murid','spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembayaranRequest $request)
    {
        $petugas = Petugas::where('user_id', auth()->user()->id)->first();

        $pembayaran = Pembayaran::create([
            'tgl_bayar' => $request->tgl_bayar,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_bayar' => $request->jumlah_bayar,
            'murid_id' => $request->murid_id,
            'spp_id' => $request->spp_id,
            'petugas_id' => $petugas->id
        ]);

        return response()->json(['status' => true, $pembayaran]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();

        return response()->json(['status' => true, $pembayaran]);
    }

    public function changeJumlahBayar($id)
    {
        $jumlahBayar = Spp::find($id);
        return response()->json($jumlahBayar);
    }

    public function history(Request $request)
    {
        $murid = Murid::where('user_id', auth()->user()->id)->first();
        if ($request->ajax()) {
            $pembayaran = Pembayaran::with(['murid','murid.kelas','petugas','spp'])->where('murid_id', $murid->id)->get();
            return DataTables::of($pembayaran)
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.pembayaran.history');
    }
}
