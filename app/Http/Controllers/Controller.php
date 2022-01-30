<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function recursion($user_id, $level, $flag = 0)
    {
        $flag++;
        if ($flag > $level) {
            return [];
        }
        $list = User::query()->where('introducer_id', $user_id)->get('user_id')->toArray();
        if ($list) {
            foreach ($list as $item) {
                $data = $this->recursion($item['user_id'], $level, $flag);
                $list = array_merge($list, $data);
            }
        }

        return $list;
    }

    public function user_ids()
    {
        $user = Auth::user();
        if ($user->rank == 1) {
            return false;
        }
        if ($user->rank == 2) {
            $user_ids = $this->recursion($user->user_id, 1000);
            $user_ids = array_column($user_ids, 'user_id');
            array_push($user_ids, $user->user_id);
            return $user_ids;
        }
        if ($user->rank == 3) {
            $user_ids = $this->recursion($user->user_id, 2);
            $user_ids = array_column($user_ids, 'user_id');
            array_push($user_ids, $user->user_id);
            return $user_ids;
        }
        return $user->user_id;

    }
}
