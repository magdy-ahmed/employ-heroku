<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class notificationController extends Controller
{
    //
    public function index(){
        $role_id = Auth::user()->role[0]->id;
        $user_id = Auth::id();
        $notifications = Notification::orderBy('created_at', 'DESC')->where('role_id','=',$role_id)->
            orWhere('user_id','=',$user_id);
        $notifications = $notifications->paginate(20);
        return view('user.notification.index',compact('notifications'));
    }
    public function read($count){
        $user_id = Auth::id();
        DB::update("UPDATE notifications set `is_read`=1 where `user_id` = $user_id
        ORDER BY created_at DESC limit $count");
        $notifications = Notification::orderBy('created_at', 'DESC')->where('user_id','=',$user_id)->limit($count);
        $notifications->update(['is_read'=>"1"]);
        return "success";
    }
}
