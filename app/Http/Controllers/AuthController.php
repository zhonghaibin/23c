<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(){
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('user_id', 'password');

        if(!$credentials['user_id']){
            return back()->withErrors([
                'user_id_msg' => 'The User-Id cannot be empty',
            ]);
        }
        if(!$credentials['password']){
            return back()->withErrors([
                'password_msg'=>'The password cannot be empty'
            ]);
        }
        if (Auth::attempt($credentials)) {
            $user=Auth::user();
            if($user->confirm_id==0){
                return back()->withErrors([
                    'user_id_msg'=>'“Account waiting for approval'
                ]);
            }
            if($user->confirm_id==1){
                return back()->withErrors([
                    'user_id_msg'=>'The account is not approved'
                ]);
            }
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'user_id_msg' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


}
