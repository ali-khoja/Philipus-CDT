@extends('app')
@section('main')
<br>
<br>
<br>
<br>
<div class="container">
 <div class="row">
    <div class="col-md-3">    </div>
    <div class="col-md-6">
        @if(session('error'))
        <div class="alert alert-danger" dir="rtl">
            <strong>عذراً!</strong> {{ session('error') }}
          </div>
     @endif
        <form action="{{ route('check.login') }}" method="POST">
            @csrf
            <div data-mdb-input-init class="form-outline mb-4" >
                <label class="form-label" for="form3Example3">البريد الالكتروني</label>
                <input type="email" name="email" id="form3Example3" placeholder="ادخل بريدك الالكتروني " class="form-control" required/>
              </div>
              <div data-mdb-input-init class="form-outline mb-4" >
                <label class="form-label" for="form3Example3">كلمة السر</label>
                <input type="password" name="password" id="form3Example3" class="form-control" required />
            </div>
            <br>
            <button type="submit" class="btn btn-success">المتابعة </button>
        </form>

    </div>
    <div class="col-md-3">    </div>
 </div>
</div>

@endsection()
