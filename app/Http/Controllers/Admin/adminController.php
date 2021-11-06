<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
        //
        public function index(){
            return view('admin.index');
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
        public function destroy(Tag $tag)
        {
            //
            $tag->delete();
            return redirect(route('tags.index'));
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
