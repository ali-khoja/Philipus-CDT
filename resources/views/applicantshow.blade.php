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
                    <h2 dir="rtl">اهلاً بك في قسم الدورات الخاصة بك <b>{{$applicant->name}} </b></h2>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped table-hover">
            <thead>
                <tr  style="text-align:center ;">
                    <th class="text-danger">Course</th>
                    <th class="text-danger">Days</th>
                    <th class="text-danger">time</th>
                    <th class="text-danger">Visual</th>
                    <th class="text-danger">Status</th>
                    <th class="text-danger">تفاصيل الدرس القادم</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicant->classes as  $c)
                @if($c->status == 'accepted')
                    <tr style="text-align: center">
                            <td>{{$c->course->name}}</td>
                            <td>{{$c->days}}</td>
                            <td>{{$c->time}}</td>
                            <td>{{$c->visual}}</td>
                            <td>{{$c->pivot->message}}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection()
