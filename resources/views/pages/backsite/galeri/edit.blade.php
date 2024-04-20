@extends('layout.master')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('galeri.update', $galeri_desa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL</label>
                            <input type="text" class="form-control" name="judul" value="{{ old('judul', $galeri_desa->judul) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI</label>
                            <input type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi', $galeri_desa->deskripsi) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">FOTO</label>
                            <input type="file" class="form-control" name="foto">
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