@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Kepala Desa</h4>

        <form class="forms-sample" method="POST" action="{{ route('kepaladesa.store') }}" enctype="multipart/form-data" style="width: 100%">
        @csrf

          <div class="form-group">
            <label for="exampleInputNama1">Nama Organisasi</label>
            <input name="nama_kepala_desa" type="text" class="form-control" id="exampleInpunama_kepala_desa1" placeholder="Masukkan Nama kepala desa">
          </div>
          <div class="form-group">
            <label for="exampleInputdeskripsi1">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="exampleInputdeskripsi1" placeholder="Masukkan Deskripsi">
          </div>

          <div class="form-group">
            <label for="foto_kepala_desa">File upload</label>
            <input type="file" name="foto_kepala_desa" id="foto_kepala_desa" class="form-control file-upload-info" placeholder="Upload Image">
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