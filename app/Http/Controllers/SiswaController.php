<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Datatables;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validation = \Validator::make($request->all(),[
            "nik" => "required|unique:siswa"
        ])->validate();

        $siswa = new \App\Siswa;

        $siswa->nik = $request->get('nik');
        $siswa->nama = $request->get('name');
        $siswa->tanggal_daftar =
            date('Y-m-d', strtotime($request->get('date')));
        $siswa->kelas = $request->get('kelas');
        if ($request->file('profile_avatar')) {
            if ($siswa->foto && file_exists(storage_path('app/public/' . $siswa->foto))) {
                \Storage::delete('public/' . $siswa->foto);
            }
            $file = $request->file('profile_avatar')->store('siswaFoto', 'public');
            $siswa->foto = $file;
        }
        $siswa->save();

        return redirect()->route('siswa.create')->with('status', 'siswa successfully created');
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
        $siswa = \App\Siswa::findOrFail($id);

        return view('siswa.edit', ['siswa' => $siswa]);
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
        $validation = \Validator::make($request->all(),[
            "nik" => "required|unique:siswa,nik,".$id
        ])->validate();


        $siswa = \App\Siswa::findOrFail($id);

        $siswa->nik = $request->get('nik');
        $siswa->nama = $request->get('name');
        $siswa->tanggal_daftar =
            date('Y-m-d', strtotime($request->get('date')));
        $siswa->kelas = $request->get('kelas');
        if ($request->file('profile_avatar')) {
            if ($siswa->foto && file_exists(storage_path('app/public/' . $siswa->foto))) {
                \Storage::delete('public/' . $siswa->foto);
            }
            $file = $request->file('profile_avatar')->store('siswaFoto', 'public');
            $siswa->foto = $file;
        }
        $siswa->save();

        return redirect()->route('siswa.edit', ['id' => $id])->with('status', 'Siswa successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $siswa = \App\Siswa::findOrFail($id);
        if ($siswa->avatar != NULL){
            unlink(storage_path('app/public/' . $siswa->avatar));
        }

        $siswa->delete();
        return response()->json([
            'success' => 'sukses',
            'message' => 'Contact Deleted'
        ]);
    }

    public function siswaJson()
    {
        $siswa = \App\Siswa::orderBy('id', 'ASC')->get();

        return Datatables::of($siswa)->make(true);
    }
}
