<?php

namespace App\Http\Controllers;

use App\User;
use App\Petugas;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\PetugasRequest;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $petugas = Petugas::all();
            return DataTables::of($petugas)
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.petugas.index');
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
    public function store(PetugasRequest $request)
    {
        
        $user = User::Create([
            'name' => $request->nama_petugas,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => PETUGAS
        ]);

        $petugas = Petugas::Create(
        [
            'nama_petugas' => $request->nama_petugas,
            'user_id' => $user->id
        ]);

        if ($petugas) {
            return response()->json(['status' => true, $petugas]);
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
        $petugas = Petugas::with('user')->find($id);
        return response()->json($petugas);
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
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        $user = User::find($petugas->user_id)->delete();

        return response()->json(['status' => true]);
    }

    public function editPetugas(Request $request, $id)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'email'=> 'required',
        ]);

        $petugas = Petugas::find($id);

        $user = User::find($petugas->user_id);
        if ($request->password) {
            $user->update([
                'name' => $request->nama_petugas,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        }else{
            $user->update([
                'name' => $request->nama_petugas,
                'email' => $request->email,
            ]);
        }

        
        $petugas->update([
            'nama_petugas' => $request->nama_petugas
        ]);

        if ($petugas) {
            return response()->json(['status' => true, $petugas]);
        }else{
            return response()->json(['status' => false]);
        }
    }
}
