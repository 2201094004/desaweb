@extends('layout.master')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('kepaladesa.update', $profil_kepala_desa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA KEPALA DESA </label>
                            <input type="text" class="form-control" name="nama_kepala_desa" value="{{ old('nama_kepala_desa', $profil_kepala_desa->nama_kepala_desa) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">FOTO</label>
                            <input type="file" class="form-control" name="foto_kepala_desa">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi', $profil_kepala_desa->deskripsi) }}">
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
