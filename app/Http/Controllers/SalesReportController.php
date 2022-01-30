<?php

namespace App\Http\Controllers;

use App\Models\SalesRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesReportController extends Controller
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


    public function salesReport(Request $request)
    {
        return view('salesReport');
    }

    public function saleReportList(Request $request)
    {
        $search_name = $request->input('search_name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $date = false;
        if ($start_date && $end_date) {
            $date = true;
        }

        $user = Auth::user();
        $list = SalesRecord::query()->when($search_name, function ($q, $v) {
            $q->where('client_name', 'like', '%' . $v . '%');
        })->when($user->rank != 1, function ($q) use ($user) {
            $q->where('user_id', $user->user_id);
        })
            ->when($date, function ($q) use ($start_date, $end_date) {
                $q->whereBetween('date_time', [$start_date, $end_date]);
            })
            ->orderBy('id', 'desc')
            ->get()->toArray();
        $list = array_map(function ($row) {
            $row['total'] = round($row['direct_comm'] + $row['referrer_comm'] + $row['bonus'] + $row['loyalty'], 2);
            return $row;
        }, $list);
        return [
            'code' => 0,
            'list' => $list
        ];


    }


}
