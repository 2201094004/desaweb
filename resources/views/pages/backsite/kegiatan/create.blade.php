@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Kegiatan Desa</h4>

            <form class="forms-sample" method="POST" action="{{ route('kegiatan.store') }}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputNama1">Nama Kegiatan</label>
                    <input name="nama_kegiatan" type="text" class="form-control" id="exampleInputNama1" placeholder="Masukkan Nama">
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="exampleInputTanggal2">Tanggal</label>
                        <div class="col-sm-9">
                            <input name="tanggal" type="date" class="form-control" id="exampleInputTanggal2" placeholder="yyyy-mm-dd" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputDeskripsi4">Deskripsi</label>
                    <input name="deskripsi" type="text" class="form-control" id="exampleInputDeskripsi4" placeholder="Masukkan Deskripsi">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="button" class="btn btn-dark" onclick="window.history.back();">Cancel</button>
            </form>
        </div>
    </div>
</div>

@endsection