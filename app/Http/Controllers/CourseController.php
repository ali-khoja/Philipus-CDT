<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseCategory;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        $category = CourseCategory::all();
        return view('admin.course.index' , compact('course' , 'category'));
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
        $image->move(public_path('images/courses'), $imageName);

        $course = Course::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'visual' => $request->input('visual'),
            'image' => $imageName,
        ]);
        return redirect()->route('course.index');
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
        $course = Course::findOrFail($id);
    if ($request->hasFile('image')) {
        if ($course->image) {
            $previousImagePath = public_path('images/courses') . '/' . $course->image;
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
        }
        $newImage = $request->file('image');
        $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
        $newImage->move(public_path('images/courses'), $newImageName);
        $course->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->category_id,
            'image' => $newImageName,
            'statue' => $request->statue,
            'visual' => $request->visual,
        ]);
    } else {
        // Update the category without changing the image
        $course->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->category_id,
            'statue' => $request->statue,
            'visual' => $request->visual,
        ]);
    }
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findorfail($id);
        $course->delete();
        return redirect()->route('course.index');
    }
}
