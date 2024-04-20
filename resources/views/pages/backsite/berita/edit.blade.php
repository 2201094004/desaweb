@extends('layout.master')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                  <form action="{{ route('berita.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL</label>
                            <input type="text" class="form-control" name="judul" value="{{ old('judul', $post->judul) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">TANGGAL</label>
                            <input type="text" class="form-control" name="tanggal" value="{{ old('tanggal', $post->tanggal) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">KONTEN</label>
                            <input type="text" class="form-control" name="konten" value="{{ old('konten', $post->konten) }}">
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