<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Philipus-cdt</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body style="background-image: url('assets/img/back.jpg');  background-position: center;
background-repeat: repeat;
background-size: cover;">
  <!-- ======= Header ======= -->
  <div id="fb-root"></div>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><img src="{{asset('assets/img/logo.png')}}" alt="no pic"></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="{{route('aboutus')}}">من نحن </a></li>
                    <li><a href="{{route('staff.shows')}}">الكادر </a></li>
                    
          <li><a href="{{route('gallery')}}">معرض الصور </a></li>
          <li><a href="{{route('comapp.create')}}">خدمات الشركات </a></li
          <li><a href="{{route('coursecategory.index2')}}"> حجز مقعد</a></li>
          <li class="dropdown"><a href="#"><span>الدورات التدريبية</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @foreach($sections as $sec)
              <li style="direction:rtl" class="dropdown"><a href="#"><span> {{$sec->name}} </span> <i class="bi bi-chevron-left"></i></a>
                <ul>
                @foreach($coucat as $c)
                    @if($c->section_id == $sec->id)
                        <li><a href="https://philipus-cdt.com/coursecategory/{{$c->id}}">{{$c->name}}  </a></li>
                    @endif
                @endforeach
                </ul>
              </li>
                @endforeach              
            </ul>
          </li>
                    <li><a class="active" href="{{route('home')}}">الصفحة الرئيسية</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      @if($t=='0')
      <a href="{{ route('applicantcourse.check' , '0') }}" class="get-started-btn">الدخول لحسابي</a>
       @else
       <a href="{{route('applicantshow2' , $applicant)}}" class="get-started-btn">عرض طلباتي</a>
      <form action="{{ route('applicant.logout') }}" method="POST">
        @csrf
        <button type="submit" style="border: none; background: none; padding: 0; margin: 10px; cursor: pointer;">            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#489029" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
        </button>
       </form>
      @endif
    </div>
  </header><!-- End Header -->
  <ul id="social-sidebar" style="z-index: 3">

    <li>
      <a href="https://www.facebook.com/profile.php?id=100083489013285" target="_blank" class="entypo-facebook"><i class='bx bxl-facebook'></i><span>Facebook</span></a>
    </li>
    <li>
      <a href="https://www.instagram.com/philipopos_?igshid=OGQ5ZDc2ODk2ZA==" target="_blank" class="entypo-instagram"><i class='bx bxl-instagram' ></i><span>instagram</span></a>
    </li>
    <li>
      <a href="https://wa.me/963995294685" target="_blank" class="entypo-whatsapp"><i class='bx bxl-whatsapp' ></i><span>whatsapp</span></a>
    </li>
    <li>
        <a href="https://t.me/Philipuspvp" target="_blank" class="entypo-telegram"><i class='bx bxl-telegram' ></i><span>telegram</span></a>
      </li>
  </ul>
  @yield('main')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

  <script>
    document.getElementById('choices').addEventListener('change', function() {
        var otherOption = document.getElementById('otherOption');
        otherOption.style.display = (this.value === '0') ? 'block' : 'none';
    });
</script>

</body>

</html>
