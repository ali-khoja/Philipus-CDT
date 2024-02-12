<?php

namespace App\Http\Controllers;
use App\Models\Comser;
use App\Models\Comapp;

use Illuminate\Http\Request;

class ComappController extends Controller
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
        $comser = Comser::all();
        return view('companyapp' , compact('comser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comapp =  Comapp::create([
                    'name' => $request->name ,
                    'comser_id' => $request->comser_id , 
                    'email' => $request->email , 
                    'comname' => $request->comname , 
                    'phone' => $request->phone ,
                    'description' => $request->description ,
               ]);

    return redirect()->route('companysuccess');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $comapp = Comapp::all();
        return view('admin.company.index' , compact('comapp'));
    }
    public function success()
    {
        return view('comsuccess');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comapp = Comapp::findorfail($id);
        $comapp->delete();
                return redirect()->back();

    }
}
