@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Penduduk</h4>

        <form class="forms-sample" method="POST" action="{{ route('datapenduduk.store') }}">
        @csrf

          <div class="form-group">
            <label for="exampleInputNama1">Nama</label>
            <input name="nama" type="text" class="form-control" id="exampleInputNama1" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="exampleSelectGender">
              <option value="male">Perempuan</option>
              <option value="female">Laki-Laki</option>
            </select>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-9">
                <input name="tanggal_lahir" type="date" class="form-control" placeholder="yyyy-mm-dd" />
                  </div>
              </div>
          </div>

          <div class="form-group">
            <label for="exampleInputAlamat3">Alamat</label>
            <input name="alamat" type="text" class="form-control" id="exampleInputAlamat3" placeholder="Alamat">
          </div>
          <div class="form-group">
            <label for="exampleInputPekerjaan4">Pekerjaan</label>
            <input name="pekerjaan" type="text" class="form-control" id="exampleInputPekerjaan4" placeholder="Pekerjaan">
          </div>
         
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button type="button" class="btn btn-dark" onclick="window.history.back();">Cancel</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection
