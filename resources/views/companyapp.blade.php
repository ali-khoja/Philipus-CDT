@extends('app')
@section('main')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
                    <h4 style="color:#3ac162; text-align:center">اهلاً بك في خدمة طلبات الشركات من مركز فيليبوس</h4>
<h5 style=" text-align:center">فضلاً قم بتعبئة النموذج كاملاً</h5>


        <div class="col-md-9">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form style="direction: rtl;" action="{{route('companyapp.store')}}" method="POST" width="50vw">
                @csrf
                                <div style="direction: rtl;" data-mdb-input-init class="form-outline mb-4" >
                        <select name="comser_id" required > 
                            <option value="">الخدمات التي نقدمها للمؤسسات و الشركات
</option>
                            @foreach($comser as $c)
                            <option value="{{$c->id}}">{{$c->id}} - {{$c->name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <textarea name="description" placeholder="فضلاً ادخل توضيحاً مختصراً عن الخدمة المطلوبة" class="form-control" rows="4" cols="50" required></textarea>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline" >
                            <label class="form-label" for="form3Example3">الاسم</label>
                            <input type="text" name="name" id="form3Example3" placeholder="ادخل اسمك " class="form-control" required />
                        </div>
                    </div>
                                        <div class="col">
                      <div data-mdb-input-init class="form-outline" >
                        <label class="form-label" for="form3Example1">رقم الهاتف</label>
                        <input type="text" name="phone" id="form3Example1" placeholder="ادخل رقم الهاتف "class="form-control" required />
                      </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div data-mdb-input-init class="form-outline" >
                            <label class="form-label" for="form3Example3">اسم الشركة</label>
                            <input type="text" name="comname" id="form3Example3" placeholder="ادخل اسم الشركة " class="form-control" required />
                        </div>
                    </div>
                                        <div class="col">
                <div data-mdb-input-init class="form-outline" >
                  <label class="form-label" for="form3Example3">البريد الالكتروني</label>
                  <input type="email" name="email" id="form3Example3" placeholder="ادخل بريدك الالكتروني " class="form-control" required /> 
                </div>
                    </div>
                </div>



                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4"> التالي</button>
            </form>
        </div>
        <div style="direction:rtl" class="col-md-3">
            <h3>Philipus - CDT </h3>
            <p>
              ســوريــة <br>
             مـحـافـظـة الــسويـداء <br>
             جــنـوب الـفــرن الآلــي <br><br>
<p> جوال :   <span>00963967258590 </span></p> 
<p> ارضي :   <span>0096316211711 </span></p> <br>
            </p>
                        <h6> ارسل استفسارك في أي وقت </h6>
<p>  <span>info@philipus-cdt.com </span></p> 

        </div>
    </div>
    
</div>

@endsection()
