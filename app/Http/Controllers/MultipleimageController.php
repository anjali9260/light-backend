<?php

namespace App\Http\Controllers;

use App\Models\Multipleimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultipleimageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'multipleimage' => 'image',
            'product_id' => 'required',
        ]);

        $data['multipleimage'] = $request->file('multipleimage')->storePublicly('backend/multipleimage', 'public');
        $data['product_id'] = $request->product_id;
        Multipleimage::create($data);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Multipleimage  $multipleimage
     * @return \Illuminate\Http\Response
     */
    public function show(Multipleimage $multipleimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Multipleimage  $multipleimage
     * @return \Illuminate\Http\Response
     */
    public function edit(Multipleimage $multipleimage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Multipleimage  $multipleimage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multipleimage $multipleimage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Multipleimage  $multipleimage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Multipleimage $multipleimage)
    {
        //
    }
}