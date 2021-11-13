<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class userController extends Controller
{
    // Flight::withTrashed()
    //     ->where('airline_id', 1)
    //     ->restore();
    public function index(){
        return view('admin.users.index',['users'=>User::get(),'role'=>-1,'roles'=>Role::all()]);
    }
    public function indexTrashed(){
        return view('admin.users.index',['users'=>User::onlyTrashed()->get(),'role'=>0,'roles'=>Role::all()]);
    }
    public function Role($role){
        // dd();
        return view('admin.users.index',['users'=>Role::find($role)->users,'role'=>$role,'roles'=>Role::all()]);
    }
    public function restore($id){
        User::withTrashed()->where('id', $id)->restore();
        return redirect(route('admin.users.trashed'));
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
        // User::withTrashed()->where('id',$id)->restore();
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
    public function create()
    {
        return abort(404);
    }
    public function show($id)
    {
        return abort(404);
    }
    public function edit( $id )
    {
        return abort(404);
    }

    public function store($request)
    {
        return abort(404);
    }


}
