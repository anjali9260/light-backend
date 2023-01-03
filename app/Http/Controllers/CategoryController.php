<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'name' => 'required',
            'slug' => 'required',
        ]);
        $data['image'] = $request->file('image')->storePublicly('backend/category', 'public');
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->slug , '-');
        Category::create($data);
        return redirect()->route('category.index')->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->slug , '-');
        if ($request->has('image')) {
            $request->validate([
                'image' => 'image',
            ]);
            $data['image'] = $request->file('image')->storePublicly('backend/category', 'public');

            if (Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

        }

        $category->update($data);
        return redirect()->route('category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }



    public function setfeatured($id){

        $category = Category::find($id);

        $category->featured = 1;

        $category->save();

        return redirect()->back()->with('success' , 'category featured Successfully');

    }

    public function removefeatured($id){

        $category = Category::find($id);

        $category->featured = 0;

        $category->save();


        return redirect()->back()->with('success' , 'category Remove From Featured Successfully');


    }



    public function setmain_featured($id){

        $category = Category::find($id);

        $category->main_featured = 1;

        $category->save();

        return redirect()->back()->with('success' , 'category main_featured Successfully');

    }


    public function removemain_featured($id){

        $category = Category::find($id);

        $category->main_featured = 0;

        $category->save();


        return redirect()->back()->with('success' , 'category Remove From main_Featured Successfully');


    }


}
