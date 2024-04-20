@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Perangkat Desa</h4>

        <form class="forms-sample" method="POST" action="{{ route('sejarah.store') }}">
        @csrf

          <div class="form-group">
            <label for="exampleInputTahun1">Tahun</label>
            <input name="tahun" type="text" class="form-control" id="exampleInputTahun1" placeholder="Masukkan Tahun">
          </div>
          <div class="form-group">
            <label for="exampleInputDeskripsi1">Deskripsi</label>
            <input name="deskripsi" type="text" class="form-control" id="exampleInputDeskripsi1" placeholder="Masukkan Deskripsi">
          </div>
         
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{ url()->previous() }}" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>
    
@endsection
