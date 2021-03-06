<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Affiliate;
use App\Models\User;
use App\Models\Setting;
use App\Models\Profile;
use App\Http\Requests\affiliateRequest;

use App\Http\Requests\codeRequest;
use Illuminate\Support\Facades\Route;

class affiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = Auth::user()->profile->code;
        if(!$code){
            do{
                $rand = rand(100000000,999999999);
                $query = Profile::where('code','=', "$rand")->first();

            }while($query !== null);
            Auth::user()->profile->update([
                "code"      => $rand
            ]);
            $code = $rand;
        }
        $affiliates = Auth::user()->affiliates()->paginate(20);
        return view('marketing.affiliate.index',compact('affiliates','code'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $affiliate_tag = '';
        do
        {
            $affiliate_tag = Str::random(50);
            $user_code = Affiliate::where('tag','=', $affiliate_tag)->first();
        }
        while(!empty($user_code));
        // dd($request->referral);


        return view('marketing.affiliate.create',compact('affiliate_tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(affiliateRequest $request)
    {
        $affiliate_expire = Setting::where('name','affiliate-expire')->first();
        $expire = $affiliate_expire->element;
        $requestData = $request->all();
        $dt = date("Y-m-d H:i:s");
        $expire_date = date("Y-m-d H:i:s",strtotime(" $dt + $expire days"));
        $requestData["expire_at"]=$expire_date;
        if(  Str::startsWith($request->referral,\Request::root() )){
            Auth::user()->affiliates()->create($requestData);
            session()->flash('success', ' ?????? ???? ?????????? ???????? ?????????????? ?????????? ???? ??????????');
            return redirect(route('marketing-affiliate.create'));
        }else{
            session()->flash('error', '?????? ???? ???????? ???????? ?????????????? ??????????????');
        }
        return redirect(route('marketing-affiliate.create'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Affiliate::find($id)->delete();
        return redirect(route('marketing-affiliate.index'));

    }
    public function redirect($affiliate_tag){
        $afilliate = Affiliate::where('tag',$affiliate_tag)->first();
        if($afilliate ==null){
            abort(404);
        }
        return redirect($afilliate->referral);
    }
    public function about(){
        return view('marketing.affiliate.about');
    }
    public function join(codeRequest $request){
        $query = Profile::where('code','like',$request->code)->first();
        if(!$query){
            session()->flash('error','???????? ???? ?????????? ???????????????? ?????? ?????????? ?????? ????????');
            return back()->withInput();
        }
        $id = $query->id;
        if($id === Auth::id()){
            session()->flash('error','???? ?????????? ???????????????? ???????????? ???????????????? ???????????? ????');
            return back()->withInput();
        }
        Auth::user()->update([
            "user_id"=>$id
        ]);
        $marketing = $query->user;
        return redirect(route('profile.index'));
    }
    public function setCookies(){
        return abort(404);
    }
    public function sellersIndex(){
        $sellers = Auth::user()->selers;
        return view('marketing.affiliate.sellers',compact('sellers'));
    }
    public function show($id)
    {
        abort(404);
    }
    public function edit($id)
    {
        abort(404);
    }
    public function update(Request $request, $id)
    {
        abort(404);
    }
    public function checkRoute($route) {
        $routes = Route::getRoutes();
        foreach($routes as $r){
            if($r->getUri() == $route){
                return true;
            }
        }

        return false;
    }
}














    // public function index2(){
    //         // $minutes = 60;
    //         // $response = new Response('Set Cookie');
    //         // $response->withCookie(cookie('name', 'MyValue', $minutes));
    //         // return $response;
    //         // $value = $request->cookie('name');
    //         // echo $value;
    //     return view('marketing.sell');
    // }


    // protected function registered(Request $request, User $user)
    // {
    //     if (! $request->hasCookie('sitesauce_affiliate')) return;

    //     $referral = json_decode($request->cookie('sitesauce_affiliate'), true)['affiliate_tag'];

    //     if (! User::where('affiliate_tag', $referral)->exists()) return;

    //     $user->update([
    //         'referred_by' => $referral,
    //     ]);
    // }


    // public function test(){
    //     return view('marketing.test');
    // }

