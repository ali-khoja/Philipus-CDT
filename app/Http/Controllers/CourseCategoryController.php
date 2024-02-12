<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\CourseCategory;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = CourseCategory::all();
        $section = Section::all();
        return view('admin.coursecategory.index' , compact('cat' ,'section'));
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $cat = CourseCategory::all();
        $groupedcat = $cat->chunk(3);
        return view('coursecategory' , compact('groupedcat'));
    }
    public function index3($id)
    {
        $cat = CourseCategory::where('section_id' , $id)->get();
        $groupedcat = $cat->chunk(3);
        return view('sectioncategory' , compact('groupedcat'));
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
        $image->move(public_path('images/categories'), $imageName);

        $course = CourseCategory::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imageName,
            'section_id' => $request->section_id,
        ]);
        return redirect()->route('coursecategory.index');
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
    public function show2($id)
    {
        $coursecategory = CourseCategory::findorfail($id);
        $courses = Course::where('category_id' , $id)->get();
        $groupedcou = $courses->chunk(3);
        return view('courses' , compact('groupedcou' , 'coursecategory'));
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
        $category = CourseCategory::findOrFail($id);
    if ($request->hasFile('image')) {
        if ($category->image) {
            $previousImagePath = public_path('images/categories') . '/' . $category->image;
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
        }
        $newImage = $request->file('image');
        $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
        $newImage->move(public_path('images/categories'), $newImageName);

        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $newImageName,
            'section_id' => $request->section_id,

        ]);
    } else {
        // Update the category without changing the image
        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'section_id' => $request->section_id,

        ]);
    }
        return redirect()->route('coursecategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = CourseCategory::findorfail($id);
        $cat->delete();
        return redirect()->route('coursecategory.index');
    }
}
