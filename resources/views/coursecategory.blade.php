@extends('app')
@section('main')
<br>
<br>
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>اختر احد التخصصات المناسبة </h2>
      </div>
      @foreach ($groupedcat as $cat)
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach ($cat as $c)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" >
                    <div class="course-item" style="width: 100%">
                        <a style="direction:rtl" href="{{route('coursecategory.show2' , $c->id)}}">
                        <img src="{{asset('images/categories/' . $c->image)}}" class="img-fluid" style="width: 100%" alt="...">
                        <div style="direction:rtl" class="course-content" style="text-align: center">
                            <div class="d-flex  align-items-center mb-3">
                                <h4 style="direction:rtl" > {{$c->name}}- {{$c->section->name}}</h4>
                            </div>
                            <p style="direction:rtl" >{{$c->description}}</p>
                        </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      @endforeach
    </div>
  </section>
@endsection()
