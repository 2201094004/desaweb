@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Perangkat Desa</h4>

        <form class="forms-sample" method="POST" action="{{ route('struktur.store') }}" enctype="multipart/form-data" style="width: 100%">>
        @csrf

          <div class="form-group">
            <label for="exampleInputNama1">Nama Organisasi</label>
            <input name="nama_organisasi" type="text" class="form-control" id="exampleInputNama1" placeholder="Masukkan Nama">
          </div>
          
          <div class="form-group">
            <label for="exampleInputJabatan1">Jabatan</label>
            <input name="jabatan" type="text" class="form-control" id="exampleInputJabatan1" placeholder="Masukkan Jabatan">
          </div>

          <div class="form-group">
            <label for="exampleInputNama_Pengurus1">Nama Pengurus</label>
            <input name="nama_pengurus" type="text" class="form-control" id="exampleInputNama_Pengurus1" placeholder="Masukkan Nama Pengurus">
          </div>

          <div class="form-group">
            <label for="foto_pengurus">File upload</label>
            <input type="file" name="foto_pengurus" id="foto_pengurus" class="form-control file-upload-info" placeholder="Upload Image">
            <div class="input-group-append">
          </div>

          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button type="button" class="btn btn-dark" onclick="window.history.back();">Cancel</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection