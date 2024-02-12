@extends('app')
@section('main')
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        
      <h1>تدريب .. تأهيل .. تمكين</h1>
      <h2>فـيـلـيـبـوس يــرشـدك إلـى الـمـسـار الــصــحـيــح</h2>

      <a href="{{route('coursecategory.index2')}}" class="btn-get-started"> سجل الآن</a>
    </div>
  </section>


<br><br><br><br><br>
<h2 style="text-align: center;color:#72a641">آخر الأخبار</h2>
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach($posts as $key => $post)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
              <img src="{{ asset('images/posts/' . $post->image) }}" style="max-height:80vh" class="d-block w-100" alt="">
              <div style="color:white ; " class="carousel-caption d-block">
                <h5 class="custom-font-size">{{$post->header}}</h5>
                <p class="custom-font-size">{{$post->description}}</p>
              </div>
            </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</div>

<main id="main">
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2 content" >

            <h3> مركز فيليبوس للتنمية والتدريب</h3>
            <p style="font-size:21px; text-align:justify;text-justify:inter-word; text-align-last: end;">
                مركز سوري معتمد ومرخص بموجب سجل تـجـاري رقم 13062، يعمل في مجال الدراسات وتأهيل وتدريب الكوادر البشرية والتنمية.
                تأسس المركز عام 2017 م، ويقدم باقة متنوعة من الأنشطة والفعاليات التدريبية من محاضرات وورش عمل ودورات وبرامج مسارات تدريبية ، منها ما هو تدريب في القاعة ومنها تدريب  عن بعد عبر منصة فيليبوس للتدريب الافتراضي.
                قدم المركز خلال الفترة الماضية ما يزيد عن 50000 ساعة تدريبية في 281 دورة تدريبية عامة في القاعة شملت 141 عنوانًا في دورات التنمية لآلاف المتدربين، بالإضافة للدورات الفردية المخصصة حسب الطلب في القاعة وعبر منصة فيليبوس للتدريب عن بعد
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 " data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="2799" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainees</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="141" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="87" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="smartphone">
                    <iframe style="width:100%;border:none;height:100%" src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F100083489013285&colorscheme=light&show_faces=true&border_color&stream=true&height=435" scrolling="yes"  allowtransparency="true" frameborder="0"></iframe>
                </div>
            </div>
                <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-xl-12 d-flex " style=" justify-content: center;">
                          <h2 style="text-align:center; color:#72a641 ;">اهدافنا</h2>
                    </div>
                </div>
                <div class="row">
                      <div class="  col-md-4 d-flex align-items-stretch">
                        <div class="icon-box mt-4 mt-xl-0">
                          <i class='bx bx-book'></i>
                          <p>تقديم برامج تدريبية متخصصة في مجالات مختلفة</p>
                        </div>
                      </div>
                    <div class="  col-md-4 d-flex align-items-stretch">
                      <div class="icon-box mt-4 mt-xl-0">
                        <i class="bx bx-cube-alt"></i>
                        <p>توفير أدوات تفاعلية وافتراضية للتدريب عن بعد</p>
                      </div>
                    </div>
                    <div class="  col-md-4 d-flex align-items-stretch">
                      <div class="icon-box mt-4 mt-xl-0">
                        <i class='bx bx-universal-access' ></i>
                        <p>تقديم خدمات استشارية في مجال تأهيل وتدريب الموارد البشرية.</p>
                      </div>
                    </div>
                  </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Courses Category</h2>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch"  >
            <div class="course-item">
              <img src="{{asset('assets/img/5.jpg')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{route('coursecategory.index3' , 2)}}"> <h4>قسم التدريب العام</h4></a>
                </div>
                <p>تهدف إلى تطوير المهارات الشخصية التي يمكن أن تساعدك في حياتك المهنية والشخصية</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" >
            <div class="course-item">
              <img src="{{asset('assets/img/6.jpg')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{route('coursecategory.index3' , 3)}}"> <h4>قسم التدريب الإداري والمهني</h4></a>
                </div>
                <p>تهدف إلى تطوير المهارات الإدارية والقيادية</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" >
            <div class="course-item">
              <img src="{{asset('assets/img/7.jpg')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{route('coursecategory.index3' , 5)}}"> <h4>قسم برامج التدريب المخصص</h4></a>
                </div>
                <p>تساعدك على تحديد أهدافك المهنية وتطوير خطة للوصول إليها</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" >
            <div class="course-item">
              <img src="{{asset('assets/img/8.jpg')}}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{route('coursecategory.index3' , 4)}}"> <h4>قسم تأهيل المدربين</h4></a>
                </div>
                <p>دورات تنمية بشرية تهدف لتأهيل مدربي التنمية البشرية وصقل مهاراتهم وإكسابهم الخبرة</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>

  <section id="counts" class="section-bg">
    <div class="container">
      <div class="row ">
        <div class="col-lg-12 col-12 text-center">
          <p style="font-size:20px;">رسالتنا</p>
        </div>
      </div>
      <div class="row ">
        <div class="col-lg-12 col-12 text-center">
          <p style="font-size:16px;color:#72a641;">نسعى في مركز فيليبوس للتنمية والتدريب إلى تقديم أفضل الخدمات التدريبية للأفراد والشركات، وذلك من خلال توفير محتوى تدريبي متنوع وبرامج تدريبية احترافية في مجالات مختلفة، بالإضافة إلى توفير أدوات تفاعلية وافتراضية للتدريب عن بعد، وتقديم خدمات استشارية في مجال تأهيل وتدريب الموارد البشرية</p>
        </div>
      </div>
    </div>
  </section>
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Philipus - CDT </h3>
            <p>
              ســوريــة <br>
             مـحـافـظـة الــسويـداء <br>
             جــنـوب الـفــرن الآلــي <br><br>
<p> جوال :   <span>00963967258590 </span></p> 
<p> ارضي :   <span>0096316211711 </span></p> <br>
            </p>
          </div>

          <div class="col-lg-4 col-md-4 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('coursecategory.index2')}}}}">Our Courses</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('gallery')}}">Gallery</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-4 footer-newsletter">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3357.2466210295975!2d36.56802847565983!3d32.70607377369344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzLCsDQyJzIxLjkiTiAzNsKwMzQnMTQuMiJF!5e0!3m2!1sen!2siq!4v1702754700916!5m2!1sen!2siq" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 ">            <h4 style="text-align:center">                Site Designed By <a href="https://www.facebook.com/profile.php?id=61553751250143"> Spark Engineering Company</a> - All Rights Reserved © 2024
</h4></div>
        </div>
      </div>
    </div>
  </footer>
  @endsection()
