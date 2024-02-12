@extends('dashboard')
@section('main')
    <div class="container">
        <div class="col-sm-12">
            <h4>{{$applicant->name}} - {{$applicant->phone}}  - {{$applicant->birth}} - {{$applicant->email}}</h4>
        </div>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Applicant <b> Courses</b></h2>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="text-align:center">
                        <th>Course Details</th>
                        <th>Statue</th>
						<th>Message</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apps as  $c)
                    <tr>
                        @if ($c->course_id != Null)
                        <td>{{$c->classes->course->name}} - {{$c->classes->days}} - {{$c->classes->time}} - {{$c->classes->visual}} </td>
                        @else
                        <td>{{$c->details}}</td>
                        @endif
                        <td>{{$c->status}}</td>
                        <td>{{$c->message}}</td>
                        <td>                            <a href="#editapp{{$c->id}}" class="edit" data-toggle="modal"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#00701c" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
                        </td>
                    </tr>
                    <div id="editapp{{$c->id}}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{route('applicant1.updateapp' , $c->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit app</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($c->course_id ===Null)
                                        <div class="form-group">
                                            <label>Course</label>
                                            <select name="course_id" id="choices">
                                                <option value="">البقاء دون صف حالياً</option>
                                                <option value="0">اختيار صف</option>
                                            </select>
                                        </div>
                                        <div id="otherOption" style="display: none;">
                                            <br>
                                            <label>Choose Class</label>
                                            <select name="other" id='0'>
                                                @foreach ($courses as $cou)
                                                        <option value="{{$cou->id}}">{{$cou->course->name}} - {{$cou->days}} - {{$cou->time}} - {{$cou->visual}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label>Course</label>
                                            <select name="course_id">
                                                <option value="{{$c->course_id}}">{{$c->classes->course->name}} -  {{$c->classes->days}} - {{$c->classes->time}} - {{$c->classes->visual}}</option>
                                                @foreach ($courses as $cou)
                                                    @if ($cou->id != $c->course_id)
                                                        <option value="{{$cou->id}}">{{$cou->course->name}} - {{$cou->days}} - {{$cou->time}} - {{$cou->visual}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status">
                                                <option value="{{$c->status}}">{{$c->status}} الحالة الحالية : </option>
                                                <option value="pending">pending</option>
                                                <option value="accepted">accepted</option>
                                                <option value="rejected">rejected</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Message:</label>
                                            <input type="text" name="message" value="{{$c->message}}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn btn-info" value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection()
