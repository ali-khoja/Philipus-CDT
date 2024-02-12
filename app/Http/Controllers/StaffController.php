<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::orderby('id')->paginate(25);
        return view('admin.staff.index' , compact('staff'));
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
        $image->move(public_path('images/staff'), $imageName);

        $staff = Staff::create([
            'name' => $request->input('name'),
            'picture' => $imageName,
            'position' => $request->input('position'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('staff.index');
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
        $staff = Staff::findOrFail($id);
        if ($request->hasFile('picture')) {
            if ($staff->picture) {
                $previousImagePath = public_path('images/staff') . '/' . $staff->picture;
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $newImage = $request->file('picture');
            $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('images/staff'), $newImageName);

            $staff->update([
                'name' => $request->input('name'),
                'picture' => $newImageName,
                'position' => $request->input('position'),
                'description' => $request->input('description'),
            ]);
        } else {
            $staff->update([
                'name' => $request->input('name'),
                'position' => $request->input('position'),
                'description' => $request->input('description'),
            ]);
        }
            return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $staff = Staff::findorfail($id);
        $staff->delete();
        return redirect()->route('staff.index');
    }
}
