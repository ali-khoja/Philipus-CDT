<?php

namespace App\Http\Controllers;

use App\Models\Classc;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\ApplicantCourse;

class ClasscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class =Classc::all();
        $course = Course::all();
        $category = CourseCategory::all();
        return view('admin.class.index' , compact( 'class' , 'course' , 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = Classc::create([
            'notes' => $request->input('notes'),
            'days' => $request->input('days'),
            'time' => $request->input('time'),
            'status' => $request->input('status'),
            'course_id' => $request->input('course_id'),
            'visual' => $request->input('visual'),
        ]);

        return redirect()->route('class.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Classc::findorfail($id);
        $activeapps = ApplicantCourse::where('course_id' , $id)->where('status' , 'accepted')->with('applicant')->get();
        $pendingapps = ApplicantCourse::where('course_id' , $id)->where('status' , 'pending')->with('applicant')->get();
        return view('admin.class.show' , compact('class' , 'activeapps' , 'pendingapps') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $class = Classc::findorfail($id);
        $class->update([
            'notes' => $request->input('notes'),
            'days' => $request->input('days'),
            'time' => $request->input('time'),
            'status' => $request->input('status'),
            'course_id' => $request->input('course_id'),
            'visual' => $request->input('visual'),
        ]);
        return redirect()->route('class.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classc::findorfail($id);
        $class->delete();
        return redirect()->route('class.index');
    }
}
