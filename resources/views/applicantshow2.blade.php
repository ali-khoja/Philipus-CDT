@extends('app')
@section('main')
<br>
<br>
<br>
<br>
<div class="container" height='100vh'>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6" >
                    <h2 dir="rtl">تفاصيل الطللبات المقدمة من  <b>{{$applicant->name}} </b></h2>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped table-hover">
            <thead>
                <tr  style="text-align:center ;">
                    <th class="text-danger">Course</th>
                    <th class="text-danger">Visual</th>
                    <th class="text-danger">Status</th>
                    <th class="text-danger">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicantcourse as  $c)
                        <tr style="text-align: center">
                                <td>{{$c->course->name}}</td>
                                <td>
                                @if($c->visual == '0')
                                حضوري
                                @else
                                اونلاين
                                @endif
                                </td>
                                <td>{{$c->status}}</td>
                                <td>{{$c->message}}</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
                                    <a href="{{route('coursecategory.index2')}}">
                <button data-mdb-ripple-init  class="btn btn-danger ">تقديم على دورة اخرى</button>
            </a>
</div>

@endsection()
