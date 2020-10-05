<?php

namespace App\Http\Controllers;

use App\Spp;
use App\User;
use App\Kelas;
use App\Murid;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\MuridRequest;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $murid = Murid::with(['spp','kelas','user'])->get();
            return DataTables::of($murid)
            ->addIndexColumn()
            ->make(true);
        }

        $spp = Spp::all();
        $kelas = Kelas::all();
        
        return view('admin.murid.index', compact('kelas','spp'));
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
    public function store(MuridRequest $request)
    {
        $user = User::Create([
            'name' => $request->nama_murid,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => MURID
        ]);

        $murid = Murid::Create(
        [
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'nama_murid' => $request->nama_murid,
            'user_id' => $user->id,
            'spp_id' => $request->spp_id,
            'kelas_id' => $request->kelas_id,
        ]);

        if ($murid) {
            return response()->json(['status' => true, $murid]);
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
        $murid = Murid::with(['user','kelas','spp'])->find($id);
        return response()->json($murid);
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

    public function updateMurid(Request $request,$id)
    {
        // $request->validate([
        //     'nama_murid' => 'required',
        //     'email'=> 'required|unique:users,email,except,'.$id,
        // ]);

        $murid = Murid::find($id);

        $user = User::find($murid->user_id);
        if ($request->password) {
            $user->update([
                'name' => $request->nama_murid,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        }else{
            $user->update([
                'name' => $request->nama_murid,
                'email' => $request->email,
            ]);
        }
        
        $murid->update([
            'nama_murid' => $request->nama_murid,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'spp_id' => $request->spp_id,
            'kelas_id' => $request->kelas_id,
        ]);

        if ($murid) {
            return response()->json(['status' => true, $murid]);
        }else{
            return response()->json(['status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $murid = Murid::find($id);
        $user = User::find($murid->user_id)->delete();

        return response()->json(['status' => true]);
    }
}
