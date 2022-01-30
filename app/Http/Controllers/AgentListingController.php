<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class AgentListingController extends Controller
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


    public function agentListing(Request $request)
    {
        return view('agentListing');
    }


    public function agentList(Request $request)
    {


        $search_name = $request->input('search_name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $date = false;
        if ($start_date && $end_date) {
            $date = true;
        }
        $user_ids = $this->user_ids();
        $list = User::query()->when($search_name, function ($q, $v) {
            $q->where('user_id', 'like', '%' . $v . '%');
        })
            ->when($user_ids, function ($q, $user_ids) {
                $q->when(is_array($user_ids), function ($q) use ($user_ids) {
                    $q->whereIn('user_id', $user_ids);
                });
                $q->when(is_string($user_ids), function ($q) use ($user_ids) {
                    $q->where('user_id', $user_ids);
                });
            })
            ->when($date, function ($q) use ($start_date, $end_date) {
                $q->whereBetween('date_time', [$start_date, $end_date]);
            })
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();

        $list = array_map(function ($row) {
            return $row;
        }, $list);
        return [
            'code' => 0,
            'list' => $list
        ];
    }


}
