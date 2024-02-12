@extends('app')
@section('main')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="text-align-last: center">
            <h2>اهلاً وسهلاً في اكاديمية فيليبوس</h2>
            <h2 style="color: #72a641">{{$applicant->name}}</h2>
            <h2 style="color: #72a641">التقدم لدورة {{$course->name}}</h2>
            <h5>اختر احدى الصفوف المتاحة من القائمة المنسدلة .. واذا لم تناسبك اي دورة اكتب لنا الاوقات المفضلة ليتم التواصل معك</h5>
            <form action="{{route('applicantcourse.store2' , ['cid' => $course->id , 'id' => $applicant->id])}}" method="POST" width="50vw">
                @csrf
                <br>
                <label for="course_id">اختر الدورة المناسبة</label>
                <select name="course_id" id="choices">
                    <option value=""> ==== </option>
                    @foreach($choices as $choice)
                        <option value="{{ $choice->id }}">{{ $choice->days }} - {{$choice->time}} - {{$choice->visual}}</option>
                    @endforeach
                    <option value="0">لم تناسبني اي دورة</option>
                </select>
                <br>
                <br>
                    <div id="otherOption" style="display: none;">
                        <br>
                        <textarea name="other" class="form-control" style="margin : 10px" id="0" rows="4" cols="50" placeholder="اكتب لنا الايام والاوقات المفضلة بالإضافة إلى نوع الدورة ( حضوري - اونلاين ) " ></textarea>
                    </div>
                <br>
                <input type="submit" class="btn btn-success" value="تثبيت">
                </form>
                <br>
            <a href="{{route('coursecategory.index2')}}">
                <button data-mdb-ripple-init  class="btn btn-danger btn-block mb-4">اختيار دورة اخرى</button>
            </a>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@endsection()
