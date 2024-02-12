@extends('dashboard')
@section('main')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Courses</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addcourse"  class="btn btn-success" data-toggle="modal">   <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/> &nbsp; </svg> <span>Add New Course &nbsp;</span></a>					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="text-align:center">
                        <th>Name</th>
                        <th>Description</th>
						<th>image</th>
						<th>category</th>
						<th>Statue</th>
							<th>Visual</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course as  $c)
                    <tr>
                        <td>{{$c->name}}</td>
                        <td>{{$c->description}}</td>
						<td><img src="{{ asset('images/courses/' . $c->image) }}" width="100px" height="100px" alt="{{ $c->name }}">
                        </td>
                        <td>{{$c->coursecategory->name}}</td>
                        <td>
                            @if ($c->statue==0)
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#27dd2d" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#fd0d0d" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                            @endif
                        </td>
                        <td>
                        @if($c->visual == '0')
                            حضوري
                                @elseif($c->visual == '1')
                            اونلاين
                                @else
                            حضوري و اونلاين
                                @endif
                        </td>

                        <td>
                            <a href="#editcourse{{$c->id}}" class="edit" data-toggle="modal"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#00701c" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
                            <a href="#deletecourse{{$c->id}}" data-target="#deletecourse{{$c->id}}" class="delete" data-toggle="modal"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#e10909" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
                        </td>
                    </tr>
                    <!-- Edit Modal HTML -->
	<div id="editcourse{{$c->id}}" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('course.update' , $c->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
					<div class="modal-header">
						<h4 class="modal-title">Edit Course</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" value="{{$c->name}}" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
                            <textarea name="description" class="form-control" rows="4" cols="50" required>{{$c->description}}</textarea>
						</div>
                        <div class="form-group">
							<label>Category</label>
                            <select name="category_id">
                                <option value="{{$c->category_id}}">{{$c->coursecategory->name}}</option>
                                @foreach ($category as $cat)
                                    @if ($cat->id != $c->category_id)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
							<label>Image</label>
							<input type="file" name="image" accept="image/*">
                            <img src="{{ asset('images/courses/' . $c->image) }}" width="75px" height="75px" alt="{{ $c->name }}">
						</div>
                        <div class="form-group">
							<label>Statue</label>
                            <select name="statue">
                                <option value="0">متوفر</option>
                                <option value="1">غير متوفر</option>
                            </select>
                        </div>
                        <div class="form-group">
							<label>Visual</label>
                            <select name="visual">
                                @if($c->visual == '0')
                                    <option value="0">حضوري</option>
                                    <option value="1">اونلاين</option>
                                    <option value="2">حضوري و اونلاين</option>
                                @elseif($c->visual == '1')
                                    <option value="1">اونلاين</option>
                                    <option value="0">حضوري</option>
                                    <option value="2">حضوري و اونلاين</option>
                                @else
                                    <option value="2">حضوري و اونلاين</option>
                                    <option value="0">حضوري</option>
                                    <option value="1">اونلاين</option>
                                @endif
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
	<div id="deletecourse{{$c->id}}" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('course.destroy', $c->id)}}" method="POST">
                    @csrf
                    @method('delete')
					<div class="modal-header">
						<h4 class="modal-title">Delete Course</h4>
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
	<div id="addcourse" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="modal-header">
						<h4 class="modal-title">Add Course</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="texta" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
                            <textarea name="description" class="form-control" rows="4" cols="50" required></textarea>
						</div>
                        <div class="form-group">
							<label>Category</label>
                            <select name="category_id">
                                @foreach ($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="image" accept="image/*">
						</div>
						<div class="form-group">
							<label>Visual</label>
                            <select name="visual">
                                    <option value="0">حضوري</option>
                                    <option value="1">اونلاين</option>
                                    <option value="2">حضوري و اونلاين</option>
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
