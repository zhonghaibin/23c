<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['registration','createRegistration','getRegistration']]);

    }


    public function registration(Request $request)
    {
        return view('registration');
    }

    public function registrationLink(Request $request)
    {
        return view('registrationLink');
    }

    public function registrationLinkUrl(Request $request)
    {

        $url = env('APP_URL') . '/registration?user_id=' . Auth::user()->user_id;
        return [
            'code' => 0,
            'url' => $url
        ];
    }

    public function createRegistration(Request $request)
    {   $user = User::query()->where('user_id', $request->input('introducer_id'))->first();
        if(!$user){
            return [
                'code' => 1,
                'error'=>'introducer_msg',
                'msg' => 'Introducer-Id  does not exist'
            ];
        }

        $user = User::query()->where('user_id', $request->input('user_id'))->first();
        if ($user) {
            return [
                'code' => 1,
                'error'=>'user_msg',
                'msg' => 'User-Id already exists'
            ];
        }
        $email=$request->input('email');
        if($email){
            $user = User::query()->where('email', $email)->first();
            if ($user) {
                return [
                    'code' => 1,
                    'error'=>'email_msg',
                    'msg' => 'Email already exists'
                ];
            }
        }


        $user = new User($request->all());
        $user->date_time = date("Y-m-d");
        $user->bank_name = '';
        $user->bank_account = '';
        $user->confirm_id = 0;
        $user->rank=$request->input('select')+2;
        $user->password=bcrypt($request->input('password'));
        if (!$user->save()) {
            return [
                'code' => 1,
                'msg' => 'save error'
            ];
        }
        return [
            'code' => 0,
            'msg' => 'success'
        ];
    }

    public function getRegistration(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::query()->where('user_id', $user_id)->first();
        return [
            'code' => 0,
            'user' => $user,
        ];

    }


}
