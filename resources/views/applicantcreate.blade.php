@extends('app')
@section('main')
<br>
<br>
<div class="container" style="height: 80vh">
    <br>
    <br>
    <div class="row" style="text-align: center; align-items:center; height:60%" >
        <div class="col-md-6" style="text-align: -webkit-center;">
            <p style=" width:50%; color: green"> في حالة التقديم لحجز مقعد ضمن كورس لأول مرة اضغط على انشاء حساب وادخل بياناتك </p>
            <a href="{{route('applicantcourse.create1' , $course->id)}}">
                <button type="button" class="btn btn-primary">
                        انشاء حساب ( تقديم لاول مرة)
                </button>
            </a>
        </div>
        <div class="col-md-6" style="text-align: -webkit-center;">
            <p style="width:50%; color: green"> في حالة انشأت حساب مسبقاً اضغط على لدي حساب سابق </p>
            <a href="{{route('applicantcourse.check' , $course->id)}}">
                <button type="button" class="btn btn-primary">
                        لدي حساب سابق
                </button>
            </a>
        </div>
    </div>
</div>
@endsection()
