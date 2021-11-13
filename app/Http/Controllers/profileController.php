<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class profileController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->profile===null){
            abort(404);
        }
        return view('profiles.index',['profile'=>$user->profile,'categories'=>Category::all()]);
    }
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            return abort(404);
        }
        if($user->profile===null){
            abort(404);
        }
        return view('profiles.index',['profile'=>$user->profile]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( )
    {
        $user = Auth::user();
        if($user->profile===null){
            abort(404);
        }
        $profile = $user->profile;
        $tags = Profile::find(Auth::id())->tags->all();
        if(count($tags) >0){
            $name_tags = array_column($tags,'name');
            $tags = implode(',',$name_tags);
        }else{
            $tags = null;
        }
        //
        return view('profiles.edit',['profile'=>$profile,'tags'=>$tags,'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $img = null;
        if($request->img){
            $img_old = DB::table('profiles')->where('user_id','=',Auth::id())->get()->all()[0]->img;
            if($img_old){
                Storage::disk('public')->delete($img_old);
            }

            $img = $request->img->store('images-profile','public');

        }else{
            $img = Profile::where('user_id','=',Auth::id())->get()->all()[0]->img;
        }



        if($request->tags){
            $tags = explode(",",$request->tags);
            $tags = array_slice($tags,1);

            foreach($tags as $k=>$tag){
                    $newTag = Tag::updateOrCreate([
                         'name'=>$tag,
                         'slug'=>$tag
                     ]);
            }

            $id = array();
            $user = User::find(Auth::id());
            foreach($tags as $k=>$tag){
                $id_=Tag::where('slug','=',$tag)->pluck('id')->toArray();
                if(count($id_)!==0){
                    array_push($id,$id_[0]);
                }
            }
            $user->tags()->sync($id);

        }

        Profile::find(Auth::id())->update([
            'content'       => $request->content,
            'img'           => $img,
            'title'         => $request->title,
            'category_id'   => $request->category
        ]);
        session()->flash('success-edit','لقد قمت بتعديل الأسم الى  الوظيفة () بنجاح ');
        return redirect(route('profile.index'));
    }
    public function updateImg(Request $request)
    {
        // return var_dump(request('content'));
        $img = null;
        // dd($request->img);
        if($request->img){
            $img_old = DB::table('profiles')->where('user_id','=',Auth::id())->get()->all()[0]->img;
            if($img_old){
                Storage::disk('public')->delete($img_old);
            }

            $img = $request->img->store('images-profile','public');

        }
        Profile::find(Auth::id())->update([
            'img'           => $img
        ]);
        session()->flash('success-edit','لقد قمت بتعديل الأسم الى  الوظيفة () بنجاح ');
        return redirect(route('profile.index'));
    }

    public function destroy(User $user)
    {
        return abort(404);
    }
    public function create()
    {
        //
        // return view('tags.create');
        return abort(404);


    }
    public function store(Request $request)
    {
        return abort(404);
    }

}
