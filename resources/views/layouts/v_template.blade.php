
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('images/books.png')}}" rel="icon">
  <link href="{{asset('images/books.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/{{'template'}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/{{'template'}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/{{'template'}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/{{'template'}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/{{'template'}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/{{'template'}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
  <script src="{{ asset('js/toastr.min.js')}}"></script>
  <link href="{{ asset('css/toastr.min.css')}}" rel="stylesheet" />
  <!-- Template Main CSS File -->
  <link href="/{{'template'}}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Jun 19 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include("layouts.v_nav")

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container" data-aos="fade-up">
      <header class="section-header">
          <h2>@yield('title')</h2>
          <p>Sistem Informasi Perpustakaan</p>
      </header>
       
    </div>
  </section><!-- End Hero -->

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include("layouts.v_footer")

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/{{'template'}}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/{{'template'}}/assets/vendor/aos/aos.js"></script>
  <script src="/{{'template'}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/{{'template'}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/{{'template'}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/{{'template'}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/{{'template'}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/{{'template'}}/assets/js/main.js"></script>

</body>

</html>