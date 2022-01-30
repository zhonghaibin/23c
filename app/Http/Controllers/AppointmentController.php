<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
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


    public function appointment(Request $request)
    {
        return view('appointment');
    }

    public function getAppointment(Request $request)
    {
        $search_name = $request->input('search_name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $date = false;
        if ($start_date && $end_date) {
            $date = true;
        }
        $user_ids = $this->user_ids();
        $list = Appointment::query()->when($search_name, function ($q, $v) {
            $q->where('visitor_name', 'like', '%' . $v . '%')->orWhere('agent_id', 'like', '%' . $v . '%');
        })->when($user_ids, function ($q, $user_ids) {
            $q->when(is_array($user_ids), function ($q) use ($user_ids) {
                $q->whereIn('agent_id', $user_ids);
            });
            $q->when(is_string($user_ids), function ($q) use ($user_ids) {
                $q->where('agent_id', $user_ids);
            });
        })
            ->when($date, function ($q) use ($start_date, $end_date) {
                $q->whereBetween('date_time', [$start_date, $end_date]);
            })
            ->orderBy('id', 'desc')
            ->get();
        return [
            'code' => 0,
            'list' => $list
        ];

    }

    public function createAppointment(Request $request)
    {
        $agent_id = $request->input('user_id');
        $user = User::query()->where('user_id', $agent_id)->first();
        if (!$user) {
            return [
                'code' => 1,
                'msg' => 'User-Id  does not exist'
            ];
        }
        $appointment = new Appointment($request->all());
        $appointment->agent_id = $agent_id;
        if (!$appointment->save()) {
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

    public function deleteAppointment(Request $request)
    {
        $id = $request->input('id');
        $appointment = Appointment::query()->where('id', $id)->first();
        if (!$appointment->delete()) {
            return [
                'code' => 1,
                'msg' => 'delete error'
            ];
        }
        return [
            'code' => 0,
            'msg' => 'success'
        ];
    }


}
