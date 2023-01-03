<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Multipleimage;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create')->with('brands', Brand::all())->with('categories', Category::all())->with('subcategories', Subcategory::all());
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
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'unique_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_thambnail' => 'required|image',
            'slug' => 'required',
        ]);

        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['unique_id'] = $request->unique_id;
        $data['product_name'] = $request->product_name;
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;
        $data['meta_title'] = $request->meta_title;
        $data['meta_description'] = $request->meta_description;
        $data['product_description'] = $request->product_description;
        $data['slug'] = Str::slug($request->slug, '-');
        $data['product_thambnail'] = $request->file('product_thambnail')->storePublicly('backend/product', 'public');
        $data['product_thambnail_alt'] = $request->product_thambnail_alt;
        $product = Product::create($data);

        foreach ($request->file('multipleimage') as $item) {
            $data1['multipleimage'] = $item->storePublicly('backend/multipleimage', 'public');
            $data1['product_id'] = $product->id;

            Multipleimage::create($data1);
        }

        return redirect()->route('product.index')->with('success', 'Product Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.create')->with('brands', Brand::all())->with('subcategories', Subcategory::all())->with('categories', Category::all())->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['unique_id'] = $request->unique_id;
        $data['product_name'] = $request->product_name;
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;
        $data['meta_title'] = $request->meta_title;
        $data['meta_description'] = $request->meta_description;
        $data['product_description'] = $request->product_description;
        $data['slug'] = Str::slug($request->slug, '-');
        $data['product_thambnail'] = $request->file('product_thambnail')->storePublicly('backend/product', 'public');
        $data['product_thambnail_alt'] = $request->product_thambnail_alt;

        if ($request->has('product_thambnail')) {
            $request->validate([
                'product_thambnail' => 'image',
            ]);

            $data['product_thambnail'] = $request->file('product_thambnail')->storePublicly('backend/product', 'public');

            if (Storage::disk('public')->exists($product->product_thambnail)) {
                Storage::disk('public')->delete($product->product_thambnail);
            }

        }

        $product->update($data);
        if ($request->file('multipleimage')) {
            foreach ($product->multipleimages as $item) {
                $multipleimages = Multipleimage::where('id', $item->id)->first();

                if (Storage::disk('public')->exists($multipleimages->multipleimage)) {
                    Storage::disk('public')->delete($multipleimages->multipleimage);
                }
                $multipleimages->delete();
            }

            foreach ($request->file('multipleimage') as $item) {
                $data1['multipleimage'] = $item->storePublicly('backend/multipleimage', 'public');
                $data1['product_id'] = $product->id;
                Multipleimage::create($data1);
            }
        }

        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        if (Storage::disk('public')->exists($product->product_thambnail)) {
            Storage::disk('public')->delete($product->product_thambnail);
        }
        $product->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');

    }
}
