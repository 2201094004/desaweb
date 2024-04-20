@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Perangkat Desa</h4>

        <form class="forms-sample" method="POST" action="{{ route('visimisi.store') }}">
        @csrf

          <div class="form-group">
            <label for="exampleInputJudul1">Judul</label>
            <input name="judul" type="text" class="form-control" id="exampleInputJudul1" placeholder="Masukkan Judul">
          </div>
          <div class="form-group">
            <label for="exampleInputDeskripsi1">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="exampleInputDeskripsi1" placeholder="Masukkan Deskripsi">
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button type="button" class="btn btn-dark" onclick="window.history.back();">Cancel</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection
