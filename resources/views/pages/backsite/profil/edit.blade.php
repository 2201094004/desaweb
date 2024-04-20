@extends('layout.master')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('profil.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama', $post->nama) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI</label>
                            <input type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi', $post->deskripsi) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ALAMAT</label>
                            <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $post->alamat) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">TELEPON</label>
                            <input type="text" class="form-control" name="telepon" value="{{ old('telepon', $post->telepon) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">EMAIL</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email', $post->email) }}">
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
