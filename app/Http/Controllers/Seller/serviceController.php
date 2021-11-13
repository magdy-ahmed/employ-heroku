<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\serviceRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Profile;
use App\Models\User;
use App\Models\Place;
use App\Models\Service;
class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('seller.service.index',['services'=>$user->services]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $places = $user->places;

        if(count($places) === 0 ){
            session()->flash("info","يجب أضافة منشئة واحدة على الأقل لأضافة خدمة ");
            return redirect(route('seller-place.create'));
        }

        return view('seller.service.create',compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(serviceRequest $request)
    {
        $img = null;
        $requestData = $request->all();
        $user = Auth::user();
        if($request->img){
            $requestData['img'] = $request->img->store('images-service','public');
        }
        $requestData['status'] = filter_var( $request->status, FILTER_VALIDATE_BOOLEAN);
        $requestData['place_id'] = $request->place;
        $service = $user->services()->create($requestData);

        return redirect()->route('seller-service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('seller.service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $places = $user->places;

        if(count($places) === 0 ){
            session()->flash("info","يجب أضافة منشئة واحدة على الأقل لأضافة خدمة ");
            return redirect(route('seller-place.create'));
        }
        $service = Service::find($id);
        return view('seller.service.create',['service'=>$service,'places'=>$places]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(serviceRequest $request, $id)
    {
        $requestData = $request->all();
        if($request->img){
            $img_old = Service::where('user_id','=',Auth::id())->get()->all()[0]->img;
            if($img_old){
                Storage::disk('public')->delete($img_old);
            }

            $img = $request->img->store('images-profile','public');

        }
        $requestData['status'] = filter_var( $request->status, FILTER_VALIDATE_BOOLEAN);
        $requestData['place_id'] = $request->place;
        $service = Service::find($id);
        $service->update($requestData);

        return redirect()->route('seller-service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $img = $service->img;
        $service->delete();
        Storage::disk('public')->delete($service->img);
        return redirect(route('seller-service.index'));
    }
}
