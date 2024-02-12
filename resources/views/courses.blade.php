@extends('app')
@section('main')
<br>
<br>
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>  اختر احد الكورسات المناسبة من قسم ( {{$coursecategory->name}}) لحجز مقعدك</h2>
      </div>
      @foreach ($groupedcou as $cat)
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach ($cat as $c)
                <div style="direction:rtl" class="col-lg-4 col-md-6 d-flex align-items-stretch" >
                    <div class="course-item" style="width: 100%">
                        <a href="{{route('applicantcourse.create1', $c->id)}}">
                        <img src="{{asset('images/courses/' . $c->image)}}" class="img-fluid" style="width: 100%" alt="...">
                        <div class="course-content">
                            <div style="margin-bottom=0px !important" class="d-flex justify-content-between align-items-center ">
                                <h4 style="direction:rtl"  > {{$c->name}}</h4>
                            </div>
                            <div  class="d-flex justify-content-between align-items-center mb-3">
@if($c->visual=='0')        
<h5  style="color:black;direction:rtl">
<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00ff40" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"/></svg>
    حــضــوري
<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff0000" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"/></svg>
      اونــلايــن 
</h5>
                              
@elseif($c->visual=='1')
<h5 style="color:black; direction:rtl">
<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff0000" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"/></svg>

    حــضــوري
<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00ff40" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"/></svg>
    اونــلايــن 
</h5>
                                @else
                                <h5 style="color:black; direction:rtl">
<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00ff40" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"/></svg>
                                                                    حــضــوري
<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00ff40" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"/></svg>
                                                                                                      اونــلايــن 
                                </h5>
                                                                @endif
                            </div>
                            <p style="direction:rtl">{{$c->description}}</p>
                        </div>

                        </a>
                    </div>
                </div>
            @endforeach
        </div>
      @endforeach
    </div>
  </section>
@endsection()
