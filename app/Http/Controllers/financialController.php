<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class financialController extends Controller
{
    public function index(){
        $walet =  Auth::user();
        return view('financial.index');
    }
}
