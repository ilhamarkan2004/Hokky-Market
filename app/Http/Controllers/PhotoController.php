<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // // $orang=User::where('id',$user);
        // dd($orang);
         $validateData = $request->validate([
        'photoprofile' => 'required|image|mimes:png,jpg,jpeg,svg',
    ]);
    $photoprofile = $request->file('photoprofile')->store('photoprofile');
    $user->photoprofile = $photoprofile;
    $user->name = Auth::user()->name;
    $user->email = Auth::user()->email;
    $user->password = Auth::user()->password;
    $user->photoprofile = $validateData['photoprofile'];
    $user->update();
    return redirect()->back();
        // $validateData = $request->validate([
        //     'photoprofile' => 'required|image|mimes:png,jpg,jpeg,svg',
            
        // ]);
        
        //     $validateData['photoprofile'] = $request->file('photoprofile')->store('photoprofile');
        //     $user->update([
        //          'name' => Auth::user()->name,
        //          'email' => Auth::user()->email,
        //          'role' => Auth::user()->role,
        //          'password' => Auth::user()->password,
        //          'photoprofile' => $validateData['photoprofile'],
        //     ]);
        //     return redirect()-> back();
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
    }
}
