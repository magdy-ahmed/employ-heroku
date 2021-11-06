<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class userController extends Controller
{
    //
    public function index(){
        // return var_dump('users',User::find(1)->role[0]->name);
        return view('users.index',['users'=>User::all(),'roles'=>Role::all()]);
    }
    public function create()
    {
        //
        return view('tags.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        //
        Tag::create($request->all());
        session()->flash('success','Creat Tag successfuly');
        return redirect(route('tags.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag )
    {
        //

        return view ('tags.create',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request,Tag $tag)
    {
        //
        $tag->update([
            'name'=>request()->name
        ]);
        session()->flash('success','Upadated Tag Successfuly');
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }

    public function updateRole($user_id,$role_id=null)
    {
        $user_role = DB::table('users_roles')
                ->where('user_id', '=', $user_id);
        $user_role -> update([
            'role_id' => $role_id
        ]);
        session()->flash('sucess','post updated successfuly');
        return redirect()->route('users.index');
    }
}
