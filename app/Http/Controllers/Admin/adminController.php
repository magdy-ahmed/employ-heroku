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
            return abort(404);


        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
            // Tag::create($request->all());
            session()->flash('success','Creat Tag successfuly');
            return abort(404);
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
            return abort(404);
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

            return abort(404);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(TagRequest $request,$id)
        {
            //

            session()->flash('success','Upadated Tag Successfuly');
            return abort(404);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
            // return redirect(route('tags.index'));
            return abort(404);
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
