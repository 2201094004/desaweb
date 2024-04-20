@extends('layout.master')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('struktur.update', $struktur_organisasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA ORGANISASI</label>
                            <input type="text" class="form-control" name="nama_organisasi" value="{{ old('nama_organisasi', $struktur_organisasi->nama_organisasi) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">FOTO</label>
                            <input type="file" class="form-control" name="foto_pengurus">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">JABATAN</label>
                            <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan', $struktur_organisasi->jabatan) }}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">NAMA PENGURUS</label>
                            <input type="text" class="form-control" name="nama_pengurus" value="{{ old('nama_pengurus', $struktur_organisasi->nama_pengurus) }}">
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
