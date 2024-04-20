@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Profil Desa</h4>

        <form class="forms-sample" method="POST" action="{{ route('profil.store') }}">
        @csrf

          <div class="form-group">
            <label for="exampleInputNama1">Nama</label>
            <input name="nama_desa" type="text" class="form-control" id="exampleInputNama1" placeholder="Masukkan Nama">
          </div>

          <div class="form-group">
            <label for="exampleInputJudul1">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="exampleInputDeskripai1" placeholder="Masukkan Deskripsi">
          </div>

          <div class="form-group">
            <label for="exampleInputAlamat1">Alamat</label>
            <input name="alamat" type="text" class="form-control" id="exampleInputAlamat1" placeholder="Masukkan Alamat">
          </div>

          <div class="form-group">
            <label for="exampleInputTelepon1">Telepon</label>
            <input name="telepon" type="text" class="form-control" id="exampleInputTelepon1" placeholder="Masukkan Telepon">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email">
          </div>
         
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button type="button" class="btn btn-dark" onclick="window.history.back();">Cancel</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection
