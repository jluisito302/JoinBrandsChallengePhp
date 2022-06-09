<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
     /**
     * METHOD LOGIN
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $credentials=request()->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect('/dashboard');
        }
        
        return redirect('/')->with('message','User not found');
    }

     
    public function register(){
        return view('register');
    }

    /**
     * METHOD REGISTER
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request){
        
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);
        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        $credentials=request()->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect('/dashboard')->with('message','Registered user ... ');
        }
       return redirect('/dashboard')->with('message','Registered user ... ');
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }else{
            return view('login');
        }
        //return redirect('/');
    }

    /**
     * Function  Forgot password
     * return view
     */
    public function forgot_password(){
        return view('forgot_password');
    }

    /**
     * Function Next reset password
     * return view with questions for reset password
     */
    public function next_reset_password(Request $request){
        $user_data=$request->except('_token');
        $user=User::where('email', $user_data['email'])->first();
        if (isset($user->id)) {
            return view('reset_password', compact('user'));
        }
        return redirect('/forgot_password')->with('message','Error! email not found');
    }

    /**
     * Function  Post Reset Password and redirect to login
     */
    public function reset_password(Request $request){
        $user_data=$request->except('_token');
        $password['password']=bcrypt($user_data['password']);
        User::where('id','=',$user_data['id'])->update($password);

        return redirect('/');
    }
    
}
