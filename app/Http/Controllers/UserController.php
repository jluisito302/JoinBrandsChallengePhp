<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Function Dashboard for User Authenticated
     */
    public function dashboard(){
        return view('dashboard');
    }

    /**
     * function Logout for User Authenticated
     */
    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('name','asc')->paginate(5);
        return view('users', compact('users'));
    }

    /**
     * PROFILE USER
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $id=auth()->user()->id;
        $user=User::findOrFail($id);
        return view('profile', compact('user'));
    }

    /**
     * CHANGE STATUS FROM USER
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id){
        $user=User::findOrFail($id);
        $status=['status'=>'Active'];
        if($user->status == 'Active'){
            $status['status']='Suspended';
            User::where('id','=',$id)->update($status);
        }else{
            User::where('id','=',$id)->update($status);
        }
        return redirect('/users')->with('message','Status changed ...');
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
    public function update(Request $request, $id)
    {
        $detail_user=$request->except('_token','_method');
        
        if($detail_user['password'] == null){
            unset($detail_user['password']);
        }else{
            $detail_user['password']=bcrypt($detail_user['password']);
        }
        User::where('id','=',$id)->update($detail_user);
        return redirect('/dashboard')->with('message','Updated data ...');
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
