<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Philipus Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminassets/css/app.css')}}">
    <style>
          body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
        text-align: center
    }

    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}


	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}
	.modal form label {
		font-weight: normal;
	}
    </style>
</head>

<body class="hold-transition sidebar-mini  ">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#5c8939" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary  elevation-4">
            <div class="sidebar ">
                <nav class="mt-2">
                    @if (Auth::user()->is_admin == '1')
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <br>
                        <br>
                        <li class="nav-item">
                            <a href="{{route('post.index')}}" class="nav-link ">
                                <p> اعلانات الصفحة الرئيسية </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('coursecategory.index')}}" class="nav-link ">
                                <p> اقسام الدورات </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('course.index')}}" class="nav-link ">
                                <p> الدورات  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link ">
                                <p> حسابات لوحة التحكم </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('applicant1.index')}}" class="nav-link ">
                                <p> بيانات الطلاب المتقدمين </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('applicant1.pending')}}" class="nav-link ">
  <p>الطلبات المعلقة <span class="badge bg-warning">{{$pending}}</span> </p> 
  </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('applicant1.accepted')}}" class="nav-link ">
  <p>الطلبات المقبولة <span class="badge bg-success">{{$accepted}}</span> </p>                             </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('applicant1.rejected')}}" class="nav-link ">
  <p>الطلبات المرفوضة <span class="badge bg-danger">{{$rejected}}</span> </p>                             </a>
                        </li>
                                                <li class="nav-item">
                            <a href="{{route('companyapp.show')}}" class="nav-link ">
  <p>طلبات الشركات </p>                             </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('gallery.index')}}" class="nav-link ">
                                <p>  معرض الصور </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('staff.index')}}" class="nav-link ">
                                <p>  الكادر </p>
                            </a>
                        </li>
                    </ul>
                    @else
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <br>
                        <br>
                        <li class="nav-item">
                            <a href="{{route('post.index')}}" class="nav-link ">
                                <p> اعلانات الصفحة الرئيسية </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('gallery.index')}}" class="nav-link ">
                                <p>  معرض الصور </p>
                            </a>
                        </li>
                    </ul>
                    @endif

                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content">
                @yield('main')
            </div>
        </div>
    </div>


    <script src="{{asset('adminassets/js/app.js')}}"></script>
    <script>
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;
			});
		} else{
			checkbox.each(function(){
				this.checked = false;
			});
		}
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
document.getElementById('choices').addEventListener('change', function() {
        var otherOption = document.getElementById('otherOption');
        otherOption.style.display = (this.value === '0') ? 'block' : 'none';
    });
</script>
</body>

</html>
