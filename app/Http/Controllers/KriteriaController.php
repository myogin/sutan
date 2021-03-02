<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kriteria.create');
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
        //     "kriteria" => "required|unique:kriteria"
        // ])->validate();

        $kriteria = new \App\Kriteria;
        $kriteria->kriteria = $request->get('kriteria');
        $kriteria->bobot = $request->get('bobot');
        $kriteria->save();

        return redirect()->route('kriteria.create')->with('status', 'kriteria successfully created');
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
        $kriteria = \App\Kriteria::findOrFail($id);

        return view('kriteria.edit', ['kriteria' => $kriteria]);
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
        //     "kriteria" => "required|unique:kriteria,kriteria,".$id
        // ])->validate();

        $kriteria = \App\Kriteria::findOrFail($id);
        $kriteria->kriteria = $request->get('kriteria');
        $kriteria->bobot = $request->get('bobot');
        $kriteria->save();

        return redirect()->route('kriteria.edit', ['id' => $id])->with('status', 'kriteria successfully Updated');
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
        $kriteria = \App\Kriteria::findOrFail($id);

        $kriteria->delete();
        return response()->json([
            'success' => 'sukses',
            'message' => 'Contact Deleted'
        ]);
    }

    public function kriteriaJson()
    {
        $kriteria = \App\kriteria::orderBy('id', 'ASC')->get();

        return Datatables::of($kriteria)->make(true);
    }
}
