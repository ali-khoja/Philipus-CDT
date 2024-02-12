<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index' , compact('posts'));
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
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/posts'), $imageName);

        $course = Post::create([
            'header' => $request->input('header'),
            'description' => $request->input('description'),
            'image' => $imageName,
        ]);
        return redirect()->route('post.index');
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
        //
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
        $post = Post::findOrFail($id);
    if ($request->hasFile('image')) {
        if ($post->image) {
            $previousImagePath = public_path('images/posts') . '/' . $post->image;
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
        }
        $newImage = $request->file('image');
        $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
        $newImage->move(public_path('images/posts'), $newImageName);
        $post->update([
            'header' => $request->input('header'),
            'description' => $request->input('description'),
            'image' => $newImageName,
        ]);
    } else {
        // Update the category without changing the image
        $post->update([
            'header' => $request->input('header'),
            'description' => $request->input('description'),

        ]);
    }
        return redirect()->route('post.index');
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
    }
}
