<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\Auth;

use App\Models\Profile;
use App\Models\User;
use App\Models\Place;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\placeRequest;
use Illuminate\Support\Facades\Storage;
class placeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $places = $user->places()->paginate(20);
        return view('seller.place.index',compact('places'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('seller.place.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(placeRequest $request)
    {
        $img = null;
        $requestData = $request->all();
        if($request->img){
            $requestData['img'] = $request->img->store('images-place','public');
        }
        // $profile = Profile::find(Auth::id());
        $requestData['status'] = filter_var( $request->status, FILTER_VALIDATE_BOOLEAN);
        if($request->daysClose !==null){
            $requestData['daysClose'] = implode(',', $request->daysClose);
        }else{
            $requestData['daysClose'] = null;
        }
        $place = Auth::user()->places()->create($requestData);

        return redirect()->route('seller-place.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);
        if($place === null){
            abort(404);
        }
        return view('seller.place.show',compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::find($id);
        if($place === null){
            abort(404);
        }
        $place->daysClose = explode(',',$place->daysClose);
        return view('seller.place.create',compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,placeRequest $request )
    {
        $requestData = $request->all();
        $img = $requestData['img'];
        if($request->img){
            $img_old = Place::where('user_id','=',Auth::id())->first()->img;
        if($img_old){
                Storage::disk('public')->delete($img_old);
            }
            $img = $request->img->store('images-place','public');
        }
        $requestData['img'] = $img;
        $requestData['status'] = filter_var( $request->status, FILTER_VALIDATE_BOOLEAN);
        if($request->daysClose !==null){
            $requestData['daysClose'] = implode(',', $request->daysClose);
        }else{
            $requestData['daysClose'] = null;
        }
        $place = Place::find($id);
        $place->update($requestData);

        return redirect()->route('seller-place.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        Storage::disk('public')->delete($place->img);
        $place->delete();
        return redirect(route('seller-place.index'));
    }
}
