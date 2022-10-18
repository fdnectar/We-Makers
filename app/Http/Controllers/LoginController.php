<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //registration
    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if ($result == true) {
            return back()->with('success', 'User Registered Successfully');
        } else {
            return back()->with('fail', 'Some error occured');
        }
    }//end registration


    //login 
    public function login()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('/admin/dashboard');
            } else {
                return back()->with('fail', 'password is wrong');
            }
        } else {
            return back()->with('fail', 'Some error occured');
        }
    } //end login

    public function logoutUser()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
