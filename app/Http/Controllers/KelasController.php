<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\KelasRequest;
use App\Kompetensi;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $kelas = Kelas::with('kompetensi')->get();
            return DataTables::of($kelas)
            ->addIndexColumn()
            ->make(true);
        }

        $kompetensi = Kompetensi::all();
        return view('admin.kelas.index', compact('kompetensi'));
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
    public function store(KelasRequest $request)
    {
        $kelas = Kelas::updateOrCreate(['id' => $request->id],
        [
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian_id' => $request->kompetensi_keahlian_id
        ]);

        if ($kelas) {
            return response()->json(['status' => true, $kelas]);
        }else{
            return response()->json(['status' => false]);
        }
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
        $kelas = Kelas::find($id);
        return response()->json($kelas);
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
        $kelas =  Kelas::find($id)->delete();

        return response()->json(['status' => true, $kelas]);
    }
}
