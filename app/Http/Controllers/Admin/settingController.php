<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\settingRequest;
class settingController extends Controller
{
    //
    public function index(){
        $setting_all = Setting::all();
        $setting = array();
        foreach($setting_all as $row){
            $setting[$row->name] = ["desc"=>$row->desc,"element"=>(int)$row->element];
        }

        return view('admin.setting.index',['setting'=>$setting]);
    }
    public function update(settingRequest $requst){
        foreach($requst->all() as $key=>$value){
            if($key !=='_token' && $key !=='_method'){
                $setting = Setting::where('name','like',$key)->first();
                $setting->element = $value;
                $setting -> save();
            }
        }
        session()->flash('success','قمت بتعديل الأعدادت بنجاح');
        return redirect(route('admin.setting.index'));
    }
}
