@extends('dashboard')
@section('main')
    <div class="container">
        <div class="col-sm-12">
            <h4>{{$class->course->name}} - {{$class->days}} - {{$class->time}} - {{$class->visual}}</h4>
        </div>

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Active <b> Students</b></h2>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="text-align:center">
                        <th>Name</th>
                        <th>Phone</th>
						<th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activeapps as  $c)
                    <tr>
                        <td>{{$c->applicant->name}}</td>
                        <td>{{$c->applicant->phone}}</td>
                        <td>{{$c->message}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{route('updateclassmessage' , $class->id )}}" method="Post">
                @csrf
                @method("Put")
                <div class="form-group">
                    <label>تعديل الرسالة لجميع الطلاب المقبولين</label>
                    <input type="text" name="message" value="" class="form-control" required>
                </div>
                <input type="submit" class="btn btn-info" value="حفظ">
            </form>
        </div>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Pending <b> Students</b></h2>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="text-align:center">
                        <th>Name</th>
                        <th>Phone</th>
						<th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingapps as  $c)
                    <tr>
                        <td>{{$c->applicant->name}}</td>
                        <td>{{$c->applicant->phone}}</td>
                        <td>{{$c->message}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection()
