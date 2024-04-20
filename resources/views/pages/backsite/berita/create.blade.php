@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Berita</h4>

        <form class="forms-sample" method="POST" action="{{ route('berita.store') }}">
        @csrf
          <div class="form-group">
            <label for="exampleInputjudul1">Judul</label>
            <input name="judul" type="text" class="form-control" id="exampleInputjudul1" placeholder="Masukkan Judul">
          </div>
          <div class="col-md-6">
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tanggal</label>
              <div class="col-sm-9">
                <input name="tanggal" type="date" class="form-control" placeholder="yyyy-mm-dd" />
                  </div>
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputkonten4">Konten</label>
            <input name="konten" type="text" class="form-control" id="exampleInputkonten4" placeholder="Masukkan Konten">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-dark">Cancel</button>
        </form>

      </div>
    </div>
  </div>
    
@endsection
