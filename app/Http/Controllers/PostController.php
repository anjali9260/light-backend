<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create')->with('tags', Tag::all());
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
            'title' => 'required',
        ]);

        $data['title'] = $request->title;
        $data['user_id'] = Auth::user()->id;

        // $post = Post::create($data);
        // if ($request->tags) {
        //     $post->tags()->attach($request->tags);
        // }
        
        return redirect()->route('post.index')->with('success', 'post created successfully');
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
    public function edit(Post $post)
    {
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        }
        $tag = Post::find($post->id)->tags;
        return view('admin.post.create')->with('post', $post)->with('tag', $tag)->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        }
        $data['title'] = $request->title;
        $data['user_id'] = Auth::user()->id;
        // if ($request->tags) {
        //     $post->tags()->sync($request->tags);
        // }
        $post->update($data);
        return redirect()->route('post.index')->with('success', 'post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        }
        $post->delete();
        return redirect()->back()->with('success', 'post deleted successfully');
    }
}