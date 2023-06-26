@extends('layouts.v_template')
@section('title','Update Buku')
@section('content')

@if (session('error'))
  <script>
    $(function () { //ready
      toastr.error("{{session('error')}}");
    });
  </script>  
@endif

<div class="container-fluid bg-light py-4 mb-4">
    <div class="container py-1">
        <div class="row g-5 align-items-center">
            <div class="card shadow p-3 mb-5 bg-white rounded animated slideInDown">
                <div class="card-body">
                    <h4 style="text-align: center">Update Buku</h4>
                    <form action="/buku/update/{{$buku->id_buku}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h6 class="form-label" for="form6Example3">Kode Buku</h6>
                        <div class="form-outline mb-4">
                          <input type="text" style="color: black" placeholder="Masukkan Kode Buku" name="kode_buku" value="{{$buku->kode_buku}}" class="form-control" />
                          <div class="text-danger">
                            @error('kode_buku')
                                {{$message}}
                            @enderror
                          </div>
                        </div> 

                        <h6 class="form-label" for="form6Example3">Nama Buku</h6>
                        <div class="form-outline mb-4">
                          <input type="text" style="color: black" placeholder="Masukkan Nama Buku" value="{{$buku->nama_buku}}" name="nama_buku" class="form-control" />
                          <div class="text-danger">
                            @error('nama_buku')
                                {{$message}}
                            @enderror
                          </div>
                        </div>

                        <h6 class="form-label" for="form6Example4">Tipe Buku</h6>
                        <div class="form-outline mb-4">
                          <select name="tipe_buku" style="color: black" class="form-select" aria-label="Default select example">
                            <option <?php if(($buku->tipe_buku) == 'Buku') echo 'selected'?> value="Buku">Buku</option>
                            <option <?php if(($buku->tipe_buku) == 'Jurnal') echo 'selected'?> value="Jurnal">Jurnal</option>
                            <option <?php if(($buku->tipe_buku) == 'Artikel') echo 'selected'?> value="Artikel">Artikel</option>
                          </select>
                          <div class="text-danger">
                            @error('tipe_buku')
                                {{$message}}
                            @enderror
                          </div>
                        </div>

                        <h6 class="form-label" for="form6Example3">Penulis Buku</h6>
                        <div class="form-outline mb-4">
                          <input type="text" style="color: black" placeholder="Masukkan Penulis Buku" value="{{$buku->penulis_buku}}" name="penulis_buku" class="form-control" />
                          <div class="text-danger">
                            @error('penulis_buku')
                                {{$message}}
                            @enderror
                          </div>
                        </div>

                        <h6 class="form-label" for="form6Example3">Foto Buku</h6>
                        <div class="form-outline mb-4">
                          <input type="file" style="color: black" placeholder="Masukkan Foto Buku" name="foto_buku" class="form-control" />
                          <div class="text-danger">
                            @error('foto_buku')
                                {{$message}}
                            @enderror
                          </div>
                        </div>
                      
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection