<?php

namespace App\Http\Controllers\Category;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\categoryRequest;
class CategoryController extends Controller
{
    //
    public function index(){
        // return var_dump('users',User::find(1)->role[0]->name);
        return view('categories.index',['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryRequest $request)
    {
        //
        Category::create($request->all());
        session()->flash('success-create','لقد قمت بأضافة الوظيفة ('.$request->name.') الجديدة بنجاح');
        return redirect(route('categories.index'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(categoryRequest $request)
    {
        Category::find((int)request()->id)->update([
            'name'=>request()->name
        ]);

        session()->flash('success-edit','لقد قمت بتعديل الأسم الى  الوظيفة ('.$request->name.') بنجاح ');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $name = $category->name;
        $category->delete();
        session()->flash('success-edit','لقد قمت بحذف الوظيفة ('.$name.') بنجاح ');
        return redirect(route('categories.index'));
    }
    public function create()
    {
        return abort(404);

    }
    public function show($id)
    {
        //
        return abort(404);
    }
    public function edit( )
    {
        return abort(404);
    }
}
