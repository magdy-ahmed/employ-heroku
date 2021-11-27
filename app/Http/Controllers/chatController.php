<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\Service;
use App\Models\User;
use App\Http\Requests\chatRequest;

class chatController extends Controller
{
    //
    public function index(){
        $all_chat = Chat::where(function ($query) {
            $query->where('user_id','=',Auth::id())->orWhere('for_user_id','=',Auth::id());
        })->where('service_id','!=',null)->with('service')->get();
        $services = array_unique($all_chat->pluck('service')->pluck('id')->toArray());
        $services = Service::whereIn('id',[...$services])->get();

        $service =  $services[0];
        $messages= Chat::where(function ($query) {
            $query->where('user_id','=',Auth::id())->orWhere('for_user_id','=',Auth::id());
        })->where('service_id','!=',null)->orderBy('created_at')->get();
        return view('user.chat.index',compact('services','service','messages'));
    }
    public function show($service_id){
        if(!Service::find($service_id)){
            abort(404);
        }
        $all_chat = Chat::where(function ($query) {
            $query->where('user_id','=',Auth::id())->orWhere('for_user_id','=',Auth::id());
        })->where('service_id','!=',null)->with('service')->get();
        $services = $all_chat->pluck('service');

        $service = Service::find($service_id);
        $messages= Chat::where(function ($query) {
            $query->where('user_id','=',Auth::id())->orWhere('for_user_id','=',Auth::id());
        })->where('service_id','=',$service_id)->orderBy('created_at')->get();
        return view('user.chat.index',compact('services','service','messages'));
    }
    public function message($sevice_id,chatRequest $request){
        if(!Service::find($sevice_id)){
            abort(404);
        }else if(!Service::find($sevice_id)->user){
            abort(404);
        }
        Chat::create([
            'content'    => $request->message,
            'service_id' => $sevice_id,
            'user_id'    => Auth::id(),
            'for_user_id'=> Service::find($sevice_id)->user->id
        ]);
        $rot = route('chat.index');
        session()->flash('success',"تم أرسال الرسالة ستجد المحادثة فى رسائلك");
        session()->flash('route',$rot);
        return back()->withInput();
    }
    public function messageSeller($sevice_id,$user_id,chatRequest $request){
        if(!Service::find($sevice_id)){
            abort(404);
        }else if(!Service::find($sevice_id)->user){
            abort(404);
        }
        Chat::create([
            'content'    => $request->message,
            'service_id' => $sevice_id,
            'user_id'    => Auth::id(),
            'for_user_id'=> $user_id
        ]);
        $rot = route('chat.index');
        session()->flash('success',"تم أرسال الرسالة ستجد المحادثة فى رسائلك");
        session()->flash('route',$rot);
        return back()->withInput();
    }

    public function sellerIndex(){
        $all_chat = Chat::where(function ($query) {
            $query->where('user_id','=',Auth::id())->orWhere('for_user_id','=',Auth::id());
        })->where('service_id','!=',null)->with('service')->get();
        $services = array_unique($all_chat->pluck('service')->pluck('id')->toArray());

        $services = Service::whereIn('id',[...$services])->where('user_id',Auth::id())->get();
        $service =  $services[0];
        $user = User::find($all_chat[0]->for_user_id);
        $messages = $user->messagesFor()->where('service_id','=',$services[0]->id)->get();
        return view('seller.chat.index',compact('services','service','messages','user'));
    }
    public function showSeller($service_id,$user_id){
        // dd(Auth::user()->services()->get()->pluck('id'));
        if(!in_array($service_id,Auth::user()->services()->get()->pluck('id')->toArray())){
            abort(404);
        }
        $all_chat = Chat::where(function ($query) {
            $query->where('user_id','!=',Auth::id())->orWhere('for_user_id','=',Auth::id());
            })->where('service_id','!=',null)->with('service')->get();
        $services = array_unique($all_chat->pluck('service')->pluck('id')->toArray());
        $service =  Service::find($service_id);
        $services = Service::whereIn('id',[...$services])->where('user_id',Auth::id())->get();
        $user = User::find($user_id);
        $messages= Chat::where(function ($query) {
            $query->where('user_id','=',Auth::id())->orWhere('for_user_id','=',Auth::id());
            })->where('service_id','=',$service_id)->orderBy('created_at')->get();
        return view('seller.chat.index',compact('services','service','messages','user'));
    }
    public function read($service_id){
        if(!Auth::user()){
            abort(404);
        }
        Chat::where('service_id','=',$service_id)
            ->where('for_user_id','=',Auth::id())->update([
                "is_read" => true
            ]);
        return "success";
    }
    public function readSeller($service_id,$user_id){
        if(!Auth::user()){
            abort(404);
        }
        Chat::where('service_id','=',$service_id)
            ->where('for_user_id','=',Auth::id())->where(
                'user_id','=',$user_id
            )->update([
                "is_read" => true
            ]);
        return "success";
    }
}
