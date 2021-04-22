<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Datatables;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('guru.create');
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
            "nip" => "required|unique:guru"
        ])->validate();

        $guru = new \App\Guru;

        $guru->nip = $request->get('nip');
        $guru->nama = $request->get('name');
        $guru->tanggal_daftar =
            date('Y-m-d', strtotime($request->get('date')));
        if ($request->file('profile_avatar')) {
            if ($guru->foto && file_exists(storage_path('app/public/' . $guru->foto))) {
                \Storage::delete('public/' . $guru->foto);
            }
            $file = $request->file('profile_avatar')->store('guruFoto', 'public');
            $guru->foto = $file;
        }
        $guru->save();

        return redirect()->route('guru.create')->with('status', 'guru successfully created');
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
        $guru = \App\Guru::findOrFail($id);

        return view('guru.edit', ['guru' => $guru]);
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
            "nip" => "required|unique:guru,nip,".$id
        ])->validate();


        $guru = \App\Guru::findOrFail($id);

        $guru->nip = $request->get('nip');
        $guru->nama = $request->get('name');
        $guru->tanggal_daftar =
            date('Y-m-d', strtotime($request->get('date')));
        if ($request->file('profile_avatar')) {
            if ($guru->foto && file_exists(storage_path('app/public/' . $guru->foto))) {
                \Storage::delete('public/' . $guru->foto);
            }
            $file = $request->file('profile_avatar')->store('guruFoto', 'public');
            $guru->foto = $file;
        }
        $guru->save();

        return redirect()->route('guru.edit', ['id' => $id])->with('status', 'Guru successfully Updated');
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
        $guru = \App\Guru::findOrFail($id);
        if ($guru->avatar != NULL){
            unlink(storage_path('app/public/' . $guru->avatar));
        }

        $guru->delete();
        return response()->json([
            'success' => 'sukses',
            'message' => 'Contact Deleted'
        ]);
    }

    public function guruJson()
    {
        $guru = \App\Guru::orderBy('id', 'ASC')->get();

        return Datatables::of($guru)->make(true);
    }
}
