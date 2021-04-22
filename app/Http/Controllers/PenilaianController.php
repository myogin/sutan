<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guru =\App\Guru::All();
        $kriteria =\App\Kriteria::All();
        $subkriteria =\App\Subkriteria::All();
        return view('penilaian.index',['guru' => $guru], ['kriteria' => $kriteria], ['subkriteria' => $subkriteria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $guru =\App\Guru::All();
        $kriteria = \App\Kriteria::with('Subkriteria')->orderBy('id', 'ASC')->get();
        return view('penilaian.create' ,['guru' => $guru], ['kriteria' => $kriteria]);
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
        // $validation = \Validator::make($request->all(),[
        //     "penilaian" => "required|unique:penilaian"
        // ])->validate();


        $penilaian = new \App\Penilaian;
        $penilaian->guru_id = $request->get('guru');
        $penilaian->total_score = 0;
        $penilaian->save();
        $penilaian_id = $penilaian->id;
        $total_score = 0;

        foreach ($request->get('subkriteria') as $key => $krt) {
        $penilaianDetail = new \App\DetailPenilaian;
        $penilaianDetail->penilaian_id = $penilaian_id;
        $penilaianDetail->subkriteria_id = $krt;

        $isi = \App\Subkriteria::with('kriteria')->find($request->get('subkriteria')[$key]);
        $penilaianDetail->nilai = $isi->nilai;
        $penilaianDetail->bobot = $isi->kriteria->bobot;

        $total_score += $penilaianDetail->nilai * $penilaianDetail->bobot;
        $penilaianDetail->save();

        }

        $penilaian = \App\Penilaian::find($penilaian_id);
        $penilaian->total_score = $total_score;
        $penilaian->save();

        return redirect()->route('penilaian.create')->with('status', 'penilaian successfully created');
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
        $penilaian = \App\Penilaian::findOrFail($id);
        $kriteria =\App\Kriteria::All();
        return view('penilaian.edit', ['penilaian' => $penilaian,'kriteria' => $kriteria]);
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
        // $validation = \Validator::make($request->all(),[
        //     "penilaian" => "required|unique:penilaian,penilaian,".$id
        // ])->validate();

        $penilaian = \App\Penilaian::findOrFail($id);
        $penilaian->kriteria_id = $request->get('kriteria');
        $penilaian->sub_kriteria = $request->get('penilaian');
        $penilaian->nilai = $request->get('nilai');
        $penilaian->save();

        return redirect()->route('penilaian.edit', ['id' => $id])->with('status', 'penilaian successfully Updated');
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
        $penilaian = \App\Penilaian::findOrFail($id);

        $penilaian->delete();
        return response()->json([
            'success' => 'sukses',
            'message' => 'Contact Deleted'
        ]);
    }

    public function penilaianJson()
    {
        // $penilaian =DB::table('penilaian')
        // ->join('guru', 'guru.id', '=', 'penilaian.guru_id')
        // ->join('subkriteria', 'subkriteria.id', '=', 'penilaian.subkriteria_id')
        // ->join('kriteria', 'kriteria.id', '=', 'subkriteria.kriteria_id')
        // // ->select('guru.nama')
        // // ->selectRaw('sum(subkriteria.nilai * kriteria.bobot) as total')
        // // ->groupBy('guru.nama')
        // ->get();



        $penilaian = \App\Penilaian::with('guru')->orderBy('id', 'ASC')->get();

        return Datatables::of($penilaian)->make(true);
    }
}
