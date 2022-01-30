<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Models\SalesRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdministrationController extends Controller
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


    public function administration(Request $request)
    {
        return view('administration');
    }

    public function createInbox(Request $request)
    {

        $user_id=$request->input('user_id');
        $user=User::query()->where('user_id',$user_id)->first();
        if(!$user){
            return [
                'code'=>1,
                'msg'=>'User-Id  does not exist'
            ];
        }

        $inbox=new Inbox($request->all());
        if(!$inbox->save()){
            return [
                'code'=>1,
                'msg'=>'save error'
            ];
        }
        return  [
            'code'=>0,
            'msg'=>'success'
        ];
    }

    public function createSales(Request $request){

        $user_id=$request->input('user_id');
        $user=User::query()->where('user_id',$user_id)->first();
        if(!$user){
            return [
                'code'=>1,
                'msg'=>'User-Id  does not exist'
            ];
        }
        $saleRecord=new SalesRecord($request->all());
        if(!$saleRecord->save()){
            return [
                'code'=>1,
                'msg'=>'save error'
            ];
        }
        return [
            'code'=>0,
            'msg'=>'success'
        ];
    }

    public function changePassword(Request $request){
        $user_id=$request->input('user_id');
        $user=User::query()->where('user_id',$user_id)->first();
        if(!$user){
            return [
                'code'=>1,
                'msg'=>'User-Id  does not exist'
            ];
        }
        $user->password=bcrypt($request->input('password'));
        if(!$user->save()){
            return [
                'code'=>1,
                'msg'=>'save error'
            ];
        }
        return  [
            'code'=>0,
            'msg'=>'success'
        ];
    }

    public function administrationList(Request $request){
        $search_name=$request->input('search_name');
        $start_date=$request->input('start_date');
        $end_date=$request->input('end_date');
        $date=false;
        if($start_date &&$end_date){
            $date=true;
        }
        $inbox=User::query()
            ->when($search_name,function ($q,$v){
                $q->where('user_id','like','%'.$v.'%')->orWhere('name','like','%'.$v.'%');
            })
            ->when($date, function ($q)use($start_date,$end_date) {
                $q->whereBetween('date_time', [$start_date, $end_date]);
            })
            ->orderBy('id','desc')
            ->get();
        return [
            'code'=>0,
            'list'=>$inbox
        ];

    }


    public function getUserInfo(Request $request){
        $user=User::query()->find($request->input('id'));
        return [
            'code'=>0,
            'data'=>[
                'user'=>$user
            ],
        ];
    }

    public function saveUserInfo(Request $request){
        /**
         * @var $user User;
         */
        $userinfo=$request->input('user');
        $user=User::query()->find($userinfo['id']);
        $user->tel=$userinfo['tel'];
        $user->address=$userinfo['address'];
        $user->select=$userinfo['select'];
        $user->bank_name=$userinfo['bank_name'];
        $user->bank_account=$userinfo['bank_account'];
        $user->email=$userinfo['email'];
        $user->rank=$userinfo['rank'];
        $user->confirm_id=$userinfo['confirm_id'];
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


}
