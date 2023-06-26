@extends('layouts.v_template')
@section('title','Detail Buku')
@section('content')
<section id="features" class="features">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Detail Buku</h2>
        </header>
        <div class="row">

            <div class="col-lg-6">
            <img src="{{url('foto/'.$buku->foto_buku)}}" class="img-fluid" alt="">
            </div>
        
            <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                <div class="row align-self-center gy-4">
            
                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-book"></i>
                            <h3>{{$buku->kode_buku}}</h3>
                        </div>
                    </div>
            
                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                    <div class="feature-box d-flex align-items-center">
                        <i class="bi bi-book"></i>
                        <h3>{{$buku->nama_buku}}</h3>
                    </div>
                    </div>
            
                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                    <div class="feature-box d-flex align-items-center">
                        <i class="bi bi-book"></i>
                        <h3>{{$buku->tipe_buku}}</h3>
                    </div>
                    </div>
            
                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                        <div class="feature-box d-flex align-items-center">
                            <i class="bi bi-file-person"></i>
                            <h3>{{$buku->penulis_buku}}</h3>
                        </div>
                    </div>
            
                </div>
            </div>
        
        </div> <!-- / row -->
    </div>

</section>

@endsection