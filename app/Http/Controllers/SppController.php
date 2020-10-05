<?php

namespace App\Http\Controllers;

use App\Http\Requests\SppRequest;
use App\Spp;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $spp = Spp::all();
            return DataTables::of($spp)
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.spp.index');
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
    public function store(SppRequest $request)
    {
        $spp = Spp::updateOrCreate(['id' => $request->id],
        [
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ]);

        if ($spp) {
            return response()->json(['status' => true, $spp]);
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
        $spp = Spp::find($id);
        return response()->json($spp);
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
        $spp =  Spp::find($id)->delete();

        return response()->json(['status' => true, $spp]);
    }
}
