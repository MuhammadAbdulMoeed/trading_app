<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

        return view('admin.users.user_listing',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       /* $password   = "12345678910";
        $image      = "";
        if(isset($request->image) && $request->image != null)
        {
            $path   = 'profile_images/';
            $image  = time().'.'.$request->image->extension();
            $request->image->move(public_path($path), $image);
        }

        $user                       = new User;
        if(isset($request->name))
            $user->name             = $request->name;
        if(isset($request->email))
            $user->email            = $request->email;
        if(isset($request->mobile_no))
            $user->mobile_no        = $request->mobile_no;
        if(isset($request->status))
            $user->status           = $request->status;
        if(isset($request->fcm_token))
            $user->fcm_token        = $request->fcm_token;
        if(isset($request->social_uid))
            $user->social_uid       = $request->social_uid;
        if(isset($request->provider))
            $user->provider         = $request->provider;
        if(isset($image) && $image != "" && $image != null)
            $user->profile_img      = $image;
        if(isset($password))
            $user->password         = bcrypt($password);
        $user->user_type            = 2;
        $user->is_verified          = 1;
        $user->save();

        return redirect()->route('users.index')->withSuccess('Successfully Created');*/
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
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
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
        $user                   = User::find($id);
        if(isset($request->name))
            $user->name         = $request->name;
        if(isset($request->email))
            $user->email        = $request->email;
//        if(isset($request->mobile_no))
//            $user->mobile_no    = $request->mobile_no;
//        if(isset($request->status))
//            $user->status       = $request->status;
//        if(isset($request->fcm_token))
//            $user->fcm_token    = $request->fcm_token;
//        if(isset($request->social_uid))
//            $user->social_uid   = $request->social_uid;
//        if(isset($request->provider))
//            $user->provider     = $request->provider;
//        if(isset($request->is_verified))
//            $user->is_verified     = $request->is_verified;
//        if(isset($image))
//            $user->profile_img = $image;
        $user->save();

        return redirect()->route('users.index')->withSuccess('Successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->withSuccess('Successfully Deleted');
    }
}
