@extends('dashboard')
@section('main')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Classes</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addclass"  class="btn btn-success" data-toggle="modal">   <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/> &nbsp; </svg> <span>Add New Class &nbsp;</span></a>					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="text-align:center">
                        <th>Course</th>
                        <th>Notes</th>
						<th>Days</th>
						<th>Time</th>
						<th>Visual</th>
						<th>Statue</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($class as  $c)
                    <tr>
                        <td>{{$c->course->name}} - {{$c->course->coursecategory->name}}</td>
                        <td>{{$c->notes}}</td>
                        <td>{{$c->days}}</td>
                        <td>{{$c->time}}</td>
                        <td>{{$c->visual}}</td>
                        <td>
                            @if ($c->statue==0)
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#27dd2d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                            @elseif ($c->statue==1)
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#fd0d0d" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                            @else
                                Finished
                            @endif
                        </td>
                        <td>
                            <a href="{{route('class.show' , $c->id)}}" class="show"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#146aff" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg></a>
                            <a href="#editclass{{$c->id}}" class="edit" data-toggle="modal"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#00701c" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
                            <a href="#deleteclass{{$c->id}}" data-target="#deleteclass{{$c->id}}" class="delete" data-toggle="modal"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#e10909" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
                        </td>
                    </tr>
                    <!-- Edit Modal HTML -->
	<div id="editclass{{$c->id}}" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('class.update' , $c->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
					<div class="modal-header">
						<h4 class="modal-title">Edit Class</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                        <div class="form-group">
							<label>Name</label>
                            <select name="course_id">
                                <option value="{{$c->course_id}}">{{$c->course->name}}</option>
                                @foreach ($course as $cou)
                                    @if ($cou->id != $c->course_id)
                                        <option value="{{$cou->id}}">{{$cou->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
						<div class="form-group">
							<label>Notes:</label>
							<input type="text" name="notes" value="{{$c->notes}}" class="form-control" >
						</div>
						<div class="form-group">
							<label>days</label>
							<input type="text" name="days" value="{{$c->days}}" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>time</label>
							<input type="text" name="time" value="{{$c->time}}" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Statue</label>
                            <select name="statue">
                                <option value="{{$c->status}}">---</option>
                                <option value="0">متوفر</option>
                                <option value="1">غير متوفر</option>
                                <option value="2">بدأ وانتهى</option>
                            </select>
                        </div>
                        <div class="form-group">
							<label>Visuality</label>
                            <select name="visual">
                                <option value="{{$c->visual}}">---</option>
                                <option value="حضوري">حضوري</option>
                                <option value="اونلاين">اونلاين</option>
                            </select>
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
	<!-- Delete Modal HTML -->
	<div id="deleteclass{{$c->id}}" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('class.destroy', $c->id)}}" method="POST">
                    @csrf
                    @method('delete')
					<div class="modal-header">
						<h4 class="modal-title">Delete Class</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
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
	<!-- Edit Modal HTML -->
	<div id="addclass" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('class.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="modal-header">
						<h4 class="modal-title">Add class</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
                    <div class="modal-body">
                        <div class="form-group">
							<label>Name</label>
                            <select name="course_id">
                                @foreach ($course as $cou)
                                        <option value="{{$cou->id}}">{{$cou->name}} -- {{$cou->coursecategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
						<div class="form-group">
							<label>Notes:</label>
							<input type="text" name="notes" class="form-control" >
						</div>
						<div class="form-group">
							<label>days</label>
							<input type="text" name="days"  class="form-control" required>
						</div>
                        <div class="form-group">
							<label>time</label>
							<input type="text" name="time"  class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Statue</label>
                            <select name="status" required>
                                <option value="0">متوفر</option>
                                <option value="1">غير متوفر</option>
                                <option value="2">بدأ وانتهى</option>
                            </select>
                        </div>
                        <div class="form-group">
							<label>Visuality</label>
                            <select name="visual" required>
                                <option value="حضوري">حضوري</option>
                                <option value="اونلاين">اونلاين</option>
                            </select>
                        </div>
					</div>

					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection()
