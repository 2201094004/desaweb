@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Perangkat Desa</h4>

        <form class="forms-sample" method="POST" action="{{ route('perangkatdesa.store') }}">
        @csrf

          <div class="form-group">
            <label for="exampleInputNama1">Nama</label>
            <input name="nama" type="text" class="form-control" id="exampleInputNama1" placeholder="Masukkan Nama">
          </div>

          <div class="form-group">
            <label for="exampleInputJabatan1">Jabatan</label>
            <input name="jabatan" type="text" class="form-control" id="exampleInputJabatan1" placeholder="Masukkan Jabatan">
          </div>

          <div class="form-group">
            <label for="foto">Upload Foto</label>
            <input type="file" name="foto" id="foto" class="form-control file-upload-info" placeholder="Upload Image">
          </div>
          
          <div class="form-group">
            <label for="exampleInputJudul1">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="exampleInputDeskripai1" placeholder="Masukkan Deskripsi">
          </div>
         
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button type="button" class="btn btn-dark" onclick="window.history.back();">Cancel</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection
