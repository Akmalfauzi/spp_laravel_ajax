<?php

namespace App\Http\Controllers;

use App\Kompetensi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\KompetensiRequest;

class KompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $role = Kompetensi::all();
            return DataTables::of($role)
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.kompetensi_keahlian.index');
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
    public function store(KompetensiRequest $request)
    {
        $komp = Kompetensi::updateOrCreate(['id' => $request->id],
        [
            'nama_kompetensi' => $request->nama_kompetensi
        ]);

        if ($komp) {
            return response()->json(['status' => true, $komp]);
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
        $komp = Kompetensi::find($id);
        return response()->json($komp);
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
        $komp =  Kompetensi::find($id)->delete();

        return response()->json(['status' => true, $komp]);
    }
}
