@extends('app')
@section('main')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
              <div class="card" style="        background: white;
              padding: 60px;
              border-radius: 4px;
              box-shadow: 0 2px 3px #C8D0D8;
              display: inline-block;
              margin: 0 auto;">
                        <form  style="direction: rtl;" action="{{route('applicantextra.update' , $app->id)}}" method="POST" width="50vw">
                            @csrf
                            @method('PUT')
<h6 style="color: #3ac162; margin:0px;">هـل تحـتـاج إلى توجـيه وظيفي ؟</h6>
<p style=" margin:0px;" >هو تقديم خدمات التوجيه والإرشاد الوظيفي للخريجين الجدد والباحثين عن فرص عمل أو الراغبين في تغيير مسارهم المهني.
يتضمن البرنامج ما يـلي:
</p>
<h6 style="color: #3ac162; margin:0px;" >
1)   التخطيط الوظيفي
</h6>
<p style=" margin:0px;">•        جلسة تعريفية فردية </p>
<p style=" margin:0px;">•        تحليل SWOT للكفاءات والمهارات الشخصية</p>
<p style=" margin:0px;">•        تقديم المشورة والتوجيه لخيارات الوظائف المناسبة</p>
<h6 style="color: #3ac162; margin:0px;" >
2)   تطوير المسار المهني (تقديم سلسلة دورات متكاملة لتأهيل وتدريب الأفراد وفق المسارات المهنية المعتمدة في سوق العمل وتطوير مهاراتهم بنفس المجال)
</h6>
<p style=" margin:0px;">•        تحديد المسار المهني المناسب (تقديم سلسلة دورات متكاملة وفق برنامج المسارات المهنية).</p>
<p style=" margin:0px;">•        أو.. تصميم وتنفيذ برنامج تدريبي مخصص لبناء وصقل المهارات حسب طلب المتدرب واحتياجه</p>
<h6 style="color: #3ac162; margin:0px;" >
3)   الدعم في البحث عن فرصة عـمل
</h6>
<p style=" margin:0px;">•        إعداد السيرة الذاتية الاحترافية</p>
<p style=" margin:0px;">•        تدريب على مقابلة العمل</p>
<p style=" margin:0px;">•        توفير3 
إعلانات حقيقية لنفس الوظيفة في الإمارات.</p>
<br>
                                <div style="direction: rtl;" data-mdb-input-init class="form-outline mb-4" >
<label style="color: #3ac162; class="form-label" for="form3Example1">  هل تريد التقديم ؟    </label>
<select name="extra" >
                            <option value="1"> نعم أريد  </option>
                            <option value="0"> لا أريد  </option>
     </select>
     </div>
<input type="submit" class="btn btn-success" value="التالي"> 
</form>
              </div>
        </div>
    </div>
    
</div>

@endsection()
