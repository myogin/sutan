<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
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
            "email" => "required|email|unique:users"
        ])->validate();

        $user = new \App\User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = \Hash::make($request->get('password'));
        $user->Status = $request->get('Status');

        if ($request->file('profile_avatar')) {
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                \Storage::delete('public/' . $user->avatar);
            }
            $file = $request->file('profile_avatar')->store('avatars', 'public');
            $user->avatar = $file;
        }
        $user->save();

        return redirect()->route('users.create')->with('status', 'User successfully created');
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
        $user = \App\User::findOrFail($id);

        return view('users.edit', ['user' => $user]);
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
            "email" => "required|email|unique:users,email,".$id
        ])->validate();

        $user = \App\User::findOrFail($id);
        $user->name = $request->get('name');
        $user->password = \Hash::make($request->get('password'));
        $user->Status = $request->get('Status');

        if ($request->file('profile_avatar')) {
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                \Storage::delete('public/' . $user->avatar);
            }
            $file = $request->file('profile_avatar')->store('avatars', 'public');
            $user->avatar = $file;
        }
        $user->save();

        return redirect()->route('users.edit', ['id' => $id])->with('status', 'User successfully Updated');
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
        $user = \App\User::findOrFail($id);
        if ($user->avatar != NULL){
            unlink(storage_path('app/public/' . $user->avatar));
        }
        $user = \App\User::findOrFail($id);

        $user->delete();
        return response()->json([
            'success' => 'sukses',
            'message' => 'Contact Deleted'
        ]);
    }

    public function userJson()
    {
        $user = \App\User::orderBy('id', 'ASC')->get();

        return Datatables::of($user)->make(true);
    }
}
