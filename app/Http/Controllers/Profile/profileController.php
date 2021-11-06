<?php

namespace App\Http\Controllers\Profile;
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
        return view('profiles.index',['profile'=>$user->profile,'categories'=>Category::all()]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( )
    {
        $profile = Auth::user()->profile;
        $tags = Profile::find(Auth::id())->tags->all();
        if(count($tags) >0){
            $name_tags = array_column($tags,'name');
            $tags = implode(',',$name_tags);
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
        // return var_dump(request('content'));
        $img = null;
        // dd($request->img);
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
            // dd(User::find(Auth::id())->profile);
            foreach($tags as $tag){
                $tagAll = DB::table('tags')->where('name', '=', $tag)->get()->all();
                if(count($tagAll) == 0){
                    $newTag = Tag::create([
                        'name'=>$tag,
                        'slug'=>$tag
                    ]);
                    $tag_id = $newTag->id;
                    $query_user_tag = DB::table('user_tag')->where('user_id','=',$tag_id)->where('tag_id','=',$tag_id)->get()->all();
                    if(count($query_user_tag) == 0 ){
                        DB::insert('insert into user_tag (tag_id,user_id) values (?, ?)', [$tag_id, Auth::id()]);
                    }
                }else{
                    $tag_id = DB::table('tags')->where('name','=', $tag)->get()->all()[0]->id;
                    $query_user_tag =DB::table('user_tag')->where('user_id','=', Auth::id())->where('tag_id','=',$tag_id)->get()->all();

                    if(count($query_user_tag) == 0 ){
                        DB::insert('insert into user_tag (tag_id,user_id) values (?, ?)', [$tagAll[0]->id, Auth::id()]);
                    }
                }

            }
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
    public function show($id)
    {
        return abort(404);
    }
}
