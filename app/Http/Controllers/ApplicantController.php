<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\ApplicantCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::orderby('created_at')->paginate(10);
        return view('admin.applicant.index' , compact('applicants'));
    }
    public function pending()
    {
        $apps = ApplicantCourse::where('status' , 'pending')->with('applicant')->get();
        return view('admin.applicant.pending' , compact('apps'));
    }
public function accepted()
    {
        $apps = ApplicantCourse::where('status' , 'accepted')->with('applicant')->get();
        return view('admin.applicant.accepted' , compact('apps'));
    }
    public function rejected()
    {
        $apps = ApplicantCourse::where('status' , 'rejected')->with('applicant')->get();
        return view('admin.applicant.rejected' , compact('apps'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $applicant = auth('applicants')->user();
        $course = Course::findorfail($id);
        if($applicant){
            return redirect()->route('afterapplicantcreate', ['id' => $id , 'aid' => $applicant->id]);
        }
        else{
            return view('applicantcreate' , compact('course'));
        }
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1($id)
    {
        $course = Course::findorfail($id);
        return view('applicantcreate1' , compact('course'));
    }
    public function check($id)
    {
        if($id!= '0'){
            return view('applicantlogin' , compact('id'));
        }
        else{
            return view('applicantlogin' , compact('id'));
        }

    }

    public function checkApplicant(Request $request , $id)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::guard('applicants')->attempt($credentials)) {
            $applicant = Auth::guard('applicants')->user();
            if($id!= '0'){
                $course = Course::findorfail($id);
                return redirect()->route('afterapplicantcreate', ['id' => $id , 'aid' => $applicant->id]);
            }
            else{
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('applicantcourse.check' , ['id' => $id])->with('error', 'البيانات المدخلة غير صحيحة');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
{
    if($request->loged==0){
        $validatedData = $request->validate([
        'name' => 'required',
        'email' => [
            'required',
            'email',
            Rule::unique('applicants', 'email'),
        ],
        'password' => 'required',
        'phone' => 'required',
        'birth' => 'required',
    ]);

    $validator = Validator::make(['email' => $request->email], [
        'email' => 'exists:applicants,email',
    ]);
    $applicant = Applicant::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'phone' => $validatedData['phone'],
        'birth' => $validatedData['birth'],
    ]);
        $credentials = $request->only('email', 'password');
    if (Auth::guard('applicants')->attempt($credentials)) {
        $applicant = Auth::guard('applicants')->user();
    }
    }
    $applicant = auth('applicants')->user();
    $applicantcourse =  ApplicantCourse::create([
                    'applicant_id' => $applicant->id ,
                    'course_id' => $id , 
                    'visual' => $request->visual , 
                    'extra' => '0' , 
                    'details' => 'لم يتم التواصل معه بعد' ,
                    'message' => 'طلبك قيد المعالجة و سيتم التواصل معك ' ,
               ]);

    return redirect()->route('applicantextra.edit',  [ 'id' => $applicantcourse->id ]);
}
   
    public function updateapp(Request $request, $id)
    {
        $appcourse = ApplicantCourse::findorfail($id);
            $appcourse->update([
                'status' => $request->status ,
                'message' => $request->message ,
                'details' => $request->details ,
           ]);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    
    public function show2($id)
    {
        $authenticatedApplicant = auth('applicants')->user();
        if($authenticatedApplicant){
            if ($authenticatedApplicant->id == $id) {
                $applicant = Applicant::findorfail($id);
                $applicantcourse = ApplicantCourse::where('applicant_id' , $id)->get();
                return view('applicantshow2' , compact('applicant' , 'applicantcourse'));
            }
        }
        else{
            abort(403, 'Unauthorized');
        }
    }
    public function logout()
    {
        auth('applicants')->logout();

        // Redirect to the home page or wherever you want after logout
        return redirect('/');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authenticatedApplicant = auth('applicants')->user();
        if($authenticatedApplicant){
            $app = ApplicantCourse::findorfail($id);
            return view('applicantextra' , compact('app'));
        }
        else{
            abort(403, 'Unauthorized');
        }
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
        $appcourse = ApplicantCourse::findorfail($id);
            $appcourse->update([
                'extra' => $request->extra ,
           ]);
           $applicant= Applicant::findorfail($appcourse->applicant_id);
            return redirect()->route('applicantshow2',  [ 'applicant' => $applicant ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = ApplicantCourse::findorfail($id);
        $app->delete();
        return redirect()->back();
    }
        public function destroy2($id)
    {
        $applicant = Applicant::findorfail($id);
        $app = ApplicantCourse::where('applicant_id' , $id)->get();
        foreach($app as $a){
            $a->delete();
        }
        $applicant->delete();
        return redirect()->back();
    }
}
