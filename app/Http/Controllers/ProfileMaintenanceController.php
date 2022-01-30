<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileMaintenanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }



    public function profileMaintenance(Request $request)
    {
        return view('profileMaintenance');
    }

    public function saveProfileMaintenance(Request $request){
        /**
         * @var $user User;
         */
        $user=Auth::user();
        $password=$request->input('password');
        if($password){
            $user->password=bcrypt($password);
        }
        $userinfo=$request->input('user');
        $user->tel=$userinfo['tel'];
        $user->address=$userinfo['address'];
        $user->select=$userinfo['select'];
        $user->bank_name=$userinfo['bank_name'];
        $user->bank_account=$userinfo['bank_account'];
        $user->email=$userinfo['email'];
        if(!$user->save()){
            return [
                'code'=>1,
                'msg'=>'save error'
            ];
        }
        return  [
            'code'=>0,
            'msg'=>'success',
            'data'=>[
                'user'=>$user
            ],
        ];

    }

    public function getProfileMaintenance(Request $request){
        $user=Auth::user();
        return [
            'code'=>0,
            'data'=>[
                'user'=>$user
            ],
        ];
    }
}
