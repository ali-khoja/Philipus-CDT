@extends('dashboard')
@section('main')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Pending Company Applications</b></h2>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="text-align:center">
                        <th>Applicant Name</th>
						<th>Applicant Company</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Service</th>
						<th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comapp as  $c)
                    <tr>
                        <td>{{$c->name}}</td>
                        <td>{{$c->comname}}</td>
                        <td>{{$c->phone}}</td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->comser->name}} </td>
                        <td>{{$c->description}}</td>
                        <td>
                            <a href="#deleteapp{{$c->id}}" data-target="#deleteapp{{$c->id}}" class="delete" data-toggle="modal"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#e10909" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
                        </td>
                    </tr>
                    
                    <div id="deleteapp{{$c->id}}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{route('companyapp.destroy', $c->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Application</h4>
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
@endsection()
