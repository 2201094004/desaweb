@extends('layout.master')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Kegiatan</label>
                            <input type="text" class="form-control" name="nama_kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Update</button>
                        <a href="{{ route('kegiatan.index') }}" class="btn btn-md btn-warning">Batal</a>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection