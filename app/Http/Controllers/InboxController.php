<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InboxController extends Controller
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


    public function inbox(Request $request)
    {
        return view('inbox');

    }

    public function list(Request $request){
        $search_name=$request->input('search_name');
        $start_date=$request->input('start_date');
        $end_date=$request->input('end_date');
        $date=false;
        if($start_date &&$end_date){
            $date=true;
        }
        $user=Auth::user();

        $inbox=Inbox::query()
            ->when($user->rank!=1,function ($q)use($user){
                $q->where('user_id',$user->user_id);
            })
            ->when($search_name,function ($q,$v){
                $q->where('user_id','like','%'.$v.'%')->orWhere('message','like','%'.$v.'%');
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




}
