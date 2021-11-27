<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Http\Requests\notificationRequest;
class notificationController extends Controller
{
    //
    public function index(){
        $notifications = Notification::orderBy('created_at', 'DESC')->where('type','not like','welcome-role')->paginate(10);
        $welcomes_role = Notification::where('type','like','welcome-role')->get();
        return view('admin.notification.index',compact('notifications','welcomes_role'));
    }
    public function create(){
        $users = User::all();
        return view('admin.notification.create',compact('users'));
    }
    public function store(notificationRequest $request){
        $requestData = $request->all();
        if($request->type === 'welcome-role'){
            $notification = Notification::where('role_id',$request->role_id)->where('type','like','welcome-role')->first();
            $requestData['user_id'] = null;
            $notification->update($requestData);
        }else if($request->type === 'now-role'){
            $requestData['user_id'] = null;
            Notification::create($requestData);
        }else if($request->type === 'user'){
            $requestData['role_id'] = null;

            Notification::create($requestData);
        }
        session()->flash('success','تم حفظ الأشعار بنجاح');
        return redirect(route('admin.notification.create'));
    }
    public function edit($id){
        $notification = Notification::find($id);
        if($notification === null){
            abort(404);
        }else if($notification->type !== 'welcome-role'){
            abort(404);
        }
        return view('admin.notification.edit',compact('notification'));
    }
    public function update($id ,notificationRequest $request){
        $notification = Notification::find($id);
        $notification->update($request->all());
        session()->flash('success','قمت بتعديل الأشعار بنجاح');
        return redirect(route('admin.notification.index'));
    }
}
// {{-- enum('user','now-role','welcome-role') --}}

