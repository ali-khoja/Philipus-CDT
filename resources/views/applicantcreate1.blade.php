@extends('app')
@section('main')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            
            @php
            $applicant = auth('applicants')->user();
            @endphp
            @if($applicant)
            <h2> Welcome {{$applicant->name}}</h2>
            <form id="yourFormId" style="direction: rtl;" action="{{route('applicantcourse.store' , $course->id)}}" method="POST" width="50vw">
                            @csrf
                                <div style="direction: rtl;" data-mdb-input-init class="form-outline mb-4" >
<label class="form-label" for="form3Example1">اختر طريقة الحضور :  </label>
                        <select name="visual" >
                        @if($course->visual == '0')
                            <option value="0"> متوفر حضوري فقط</option>
                        @elseif($course->visual == '1')
                            <option value="1"> متوفر اونلاين فقط</option>
                        @else
                            <option value="0"> حضوري  </option>
                            <option value="1"> اونلاين  </option>
                        @endif
                        </select>
                </div>
                <div style="direction: rtl;" data-mdb-input-init class="form-outline mb-4" >
                        <label class="form-label" for="form3Example2">الدورة المختارة : </label>
                        <select name="course_id" >
                            <option value="{{$course->id}}"> {{$course->name}}</option>
                        </select>  
                                    <a href="{{route('coursecategory.index2')}}">
                <button data-mdb-ripple-init  class="btn btn-danger ">اختيار دورة اخرى</button>
            </a>
                </div>
                        <input type="hidden" id="answerInput" name="answer" value="">
                        <input type="hidden" id="loged" name="loged" value="1">

                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4"> التالي</button>
               
            </form>
            @else
            <form id="yourFormId" style="direction: rtl;" action="{{route('applicantcourse.store' , $course->id)}}" method="POST" width="50vw">
                @csrf
                <div data-mdb-input-init class="form-outline mb-4" >
                    <label class="form-label" for="form3Example3">الاسم</label>
                    <input type="text" name="name" id="form3Example3" placeholder="ادخل اسمك " class="form-control" />
                </div>
                <div data-mdb-input-init class="form-outline mb-4" >
                  <label style=" text-align:center; font-size:14px" class="form-label text-danger" for="form3Example3"> <b>
                  يرجى كتابة بريد الكتروني و كلمة مرور خاصة بالمركز لمراجعة طلباتك لاحقا
</b></label>
<br>
                  <label class="form-label" for="form3Example3">البريد الالكتروني</label>

                  <input type="email" name="email" id="form3Example3" placeholder="ادخل بريدك الالكتروني " class="form-control" />
                </div>
                <div data-mdb-input-init class="form-outline mb-4" >
                    <label class="form-label" for="form3Example3">كلمة السر</label>
                    <input type="password" name="password" id="form3Example3" class="form-control" />
                </div>
                <div class="row mb-4">
                    <div class="col">
                      <div data-mdb-input-init class="form-outline" >
                        <label class="form-label" for="form3Example1">رقم الهاتف</label>
                        <input type="text" name="phone" id="form3Example1" placeholder="ادخل رقم الهاتف "class="form-control" />
                      </div>
                    </div>
                    <div class="col">
                      <div data-mdb-input-init class="form-outline" >
                        <label class="form-label" for="form3Example2">المواليد</label>
                        <input type="date" name="birth" id="form3Example2" class="form-control" />
                      </div>
                    </div>
                </div>
                                <div style="direction: rtl;" data-mdb-input-init class="form-outline mb-4" >
<label class="form-label" for="form3Example1">اختر طريقة الحضور :  </label>
                        <select name="visual" >
                        @if($course->visual == '0')
                            <option value="0"> متوفر حضوري فقط</option>
                        @elseif($course->visual == '1')
                            <option value="1"> متوفر اونلاين فقط</option>
                        @else
                            <option value="0"> حضوري  </option>
                            <option value="1"> اونلاين  </option>
                        @endif
                        </select>
                </div>
                <div style="direction: rtl;" data-mdb-input-init class="form-outline mb-4" >
                        <label class="form-label" for="form3Example2">الدورة المختارة : </label>
                        <select name="course_id" >
                            <option value="{{$course->id}}"> {{$course->name}}</option>
                        </select>  

                </div>
                        <input type="hidden" id="loged" name="loged" value="0">

                <button  type="submit" class="btn btn-primary btn-block mb-4"> التالي</button>
               
            </form>
             @endif

        </div>
        <div class="col-md-3"></div>
    </div>
    
</div>

@endsection()
