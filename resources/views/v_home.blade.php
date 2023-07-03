
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Informasi Perpustakaan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('images/books.png')}}" rel="icon">
  <link href="{{asset('images/books.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{'template'}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{'template'}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{'template'}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{'template'}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{'template'}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{'template'}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
  <script src="{{ asset('js/toastr.min.js')}}"></script>
  <link href="{{ asset('css/toastr.min.css')}}" rel="stylesheet" />
  <!-- Template Main CSS File -->
  <link href="{{'template'}}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Jun 19 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  @if (session('success'))
    <script>
      $(function () { //ready
        toastr.success("{{session('success')}}");
      });
    </script>
  @elseif (session('error'))
    <script>
      $(function () { //ready
        toastr.error("{{session('error')}}");
      });
    </script>
  @endif
  <!-- ======= Header ======= -->
  @include("layouts.v_nav")

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Sistem Informasi Perpustakaan</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Sistem Ini Digunakan Untuk Dapat Membantu Admin Perpustakaan Dalam Menjalankan Tugasnya</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#values" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Lihat Daftar Buku</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{'template'}}/assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Daftar Buku</h2>
        </header>
        
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Judul</th>
              <th scope="col">Tipe</th>
              <th scope="col">Penulis</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
            ?>
            @foreach ($buku as $data)
              <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{$data->nama_buku}}</td>
                <td>{{$data->tipe_buku}}</td>
                <td>{{$data->penulis_buku}}</td>
                <td>
                  <a href="/buku/detail/{{$data->id_buku}}" class="btn btn-sm btn-info"><i class="bi bi-info-circle"></i></a>
                  <a href="/buku/edit/{{$data->id_buku}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                  <button data-bs-target="#delete{{$data->id_buku}}" data-bs-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {!! $buku->links() !!}
        </div>
        <a href="/buku/add" class="btn btn-sm btn-success">Add &nbsp;<i class="bi bi-plus-circle"></i></a>
      </div>

    </section><!-- End Values Section -->

    @foreach ($buku as $data)
    <div class="modal fade" id="delete{{$data->id_buku}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h5 class="modal-title text-white" id="exampleModalLabel">{{$data->nama_buku}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-danger">
              Apakah anda yakin ingin menghapus ini?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
              <a href="/buku/delete/{{$data->id_buku}}" class="btn btn-danger btndelete">Yes</a>
            </div>
          </div>
        </div>
    </div>
    @endforeach

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">

        
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include("layouts.v_footer")

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{'template'}}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{'template'}}/assets/vendor/aos/aos.js"></script>
  <script src="{{'template'}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{'template'}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{'template'}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{'template'}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{'template'}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{'template'}}/assets/js/main.js"></script>

</body>

</html>