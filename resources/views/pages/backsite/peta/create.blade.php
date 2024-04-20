@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Peta</h4>

        <form class="forms-sample" method="POST" action="{{ route('peta.store') }}">
        @csrf

          <div class="form-group">
            <label for="exampleInputNama1">Nama</label>
            <input name="nama" type="text" class="form-control" id="exampleInputNama1" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="exampleInputLalitude1">Lalitude</label>
            <input name="Lalitude" type="text" class="form-control" id="exampleInputLalitude1" placeholder="Masukkan Lalitude">
          </div>
          <div class="form-group">
            <label for="exampleInputLongitude1">Longitude</label>
            <input name="Longitude" type="text" class="form-control" id="exampleInputLongitude1" placeholder="Masukkan Longitude">
          </div>
         
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button type="button" class="btn btn-dark" onclick="window.history.back();">Cancel</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection
