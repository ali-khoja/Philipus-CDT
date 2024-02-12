<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::orderby('id')->paginate(25);
        return view('admin.gallery.index' , compact('gallery'));
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
        $image = $request->file('picture');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/gallery'), $imageName);

        $gallery = Gallery::create([
            'picture' => $imageName,
            'header' => $request->input('header'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('gallery.index');
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
        $gallery = Gallery::findOrFail($id);
        if ($request->hasFile('picture')) {
            if ($gallery->picture) {
                $previousImagePath = public_path('images/gallery') . '/' . $gallery->picture;
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $newImage = $request->file('picture');
            $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('images/gallery'), $newImageName);

            $gallery->update([
                'picture' => $newImageName,
                'header' => $request->input('header'),
                'description' => $request->input('description'),
            ]);
        } else {
            $gallery->update([
                'header' => $request->input('header'),
                'description' => $request->input('description'),
            ]);
        }
            return redirect()->route('gallery.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findorfail($id);
        $gallery->delete();
        return redirect()->route('gallery.index');
    }
}
