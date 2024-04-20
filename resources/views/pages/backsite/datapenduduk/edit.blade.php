@extends('layout.master')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('datapenduduk.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama', $post->nama) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">JENIS KELAMIN</label>
                            <input type="text" class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin', $post->jenis_kelamin) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">TANGGAL LAHIR</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', $post->tanggal_lahir) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ALAMAT</label>
                            <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $post->alamat) }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">PEKERJAAN</label>
                            <input type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan', $post->pekerjaan) }}">
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