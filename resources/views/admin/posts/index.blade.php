@extends('dashboard')
@section('main')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Posts</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addpost"  class="btn btn-success" data-toggle="modal">   <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/> &nbsp; </svg> <span>Add Post &nbsp;</span></a>					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="text-align:center">
                        <th>Header</th>
                        <th>Description</th>
						<th>image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as  $post)
                    <tr>
                        <td>{{$post->header}}</td>
                        <td>{{$post->description}}</td>
						<td><img src="{{ asset('images/posts/' . $post->image) }}" width="100px" height="100px" alt="{{ $post->name }}">
                        </td>
                        <td>
                            <a href="#editpost{{$post->id}}" class="edit" data-toggle="modal"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#00701c" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
                        </td>
                    </tr>
                    <!-- Edit Modal HTML -->
	<div id="editpost{{$post->id}}" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('post.update' , $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
					<div class="modal-header">
						<h4 class="modal-title">Edit Post</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Header</label>
							<input type="text" name="header" value="{{$post->header}}" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
                            <textarea name="description" class="form-control" rows="4" cols="50" required>{{$post->description}}</textarea>
						</div>

                        <div class="form-group">
							<label>Image</label>
							<input type="file" name="image" accept="image/*">
                            <img src="{{ asset('images/posts/' . $post->image) }}" width="75px" height="75px" alt="{{ $post->name }}">
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
	<!-- Edit Modal HTML -->
	<div id="addpost" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="modal-header">
						<h4 class="modal-title">Add Post</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Header</label>
							<input type="text" name="header" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
                            <textarea name="description" class="form-control" rows="4" cols="50" required></textarea>
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="image" accept="image/*">
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
