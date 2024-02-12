<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\Staff;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post1 = Post::first();
        $posts = Post::all();
        return view('home' , compact('posts' , 'post1' ));
    }
    public function aboutus()
    {
        return view('aboutus' );
    }
    public function gallery()
    {
        $gallery = Gallery::orderby('created_at' , 'desc')->get();
        $galleryg = $gallery->chunk(4);
        return view('gallery' , compact('gallery' , 'galleryg'));
    }
        public function staff()
    {
        $gallery = Staff::orderby('id' , 'desc')->get();
        $galleryg = $gallery->chunk(4);
        return view('staff' , compact('gallery' , 'galleryg'));
    }

}
