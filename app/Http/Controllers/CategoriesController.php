<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::paginate(3);

      return view('categories.index',
              [
                'categories'=>$categories
              ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //MODEL-INTERACCIóN
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;

        if($category->save()) {
          return redirect('/categories');
        } else {
          return view('categories.create');
        }
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
    public function edit($id)
    {
      $category = Category::find($id);
      return view('categories.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $category = Category::find($id);
      $categories = Category::pluck('name','id');
      $category->name = $request->name;
      $category->description = $request->description;

      //Image
      if($request->file('image')){
        $file = $request->file('image');
        $name =
        $category->id.'_'.time().'.'.$file->getClientOriginalExtension();
        $path = public_path().'/images/products/';
        $file->move($path,$name);
        $category->image = $name;
      }
      if($category->save()) {
        return redirect('/categories');
      } else {
        return view('categories.edit');

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
   			return redirect('/categories');
    }
}
