<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index')->with('brands', Brand::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'slug'=>'required'
        ]);
        $data['image'] = $request->file('image')->storePublicly('backend/brand', 'public');
        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->slug , '-');
        Brand::create($data);
        return redirect()->route('brand.index')->with('success', 'Brand Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.create')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {

        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->slug , '-');
        if ($request->has('image')) {
            $request->validate([
                'image' => 'image',
            ]);
            $data['image'] = $request->file('image')->storePublicly('backend/brand', 'public');

            if (Storage::disk('public')->exists($brand->image)) {
                Storage::disk('public')->delete($brand->image);
            }

        }

        $brand->update($data);
        return redirect()->route('brand.index')->with('success', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if (Storage::disk('public')->exists($brand->image)) {
            Storage::disk('public')->delete($brand->image);
        }
        $brand->delete();
        return redirect()->back()->with('success', 'Brand Deleted Successfully');
    }
}
