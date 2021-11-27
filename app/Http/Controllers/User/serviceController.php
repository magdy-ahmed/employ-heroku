<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Service;

use Illuminate\Support\Facades\Storage;

class serviceController extends Controller
{
    //
    public function index(){

        $services = Service::paginate(20)->onEachSide(1);
        return view("user.services.index",compact('services'));

    }
    public function indexFavorit(){
        $favorites = Auth::user()->favorites()->paginate(20);
        return view("user.services.index",compact('favorites'));
    }
    public function createFavorit($id){
        $user = Auth::user();
        $user->favorites()->attach($id);
        return response()->json(['success'=>$id]);
    }
    public function destroyFavorit($id){
        $user = Auth::user();
        $user = $user->favorites()->detach([(int)$id]);
        return response()->json(['success'=>$user]);
    }

}
