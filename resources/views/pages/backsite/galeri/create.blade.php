@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Galeri</h4>

            <form class="forms-sample" method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data" style="width: 100%">
                @csrf

                <div class="form-group">
                    <label for="exampleInputJudul1">Judul</label>
                    <input name="judul" type="text" class="form-control" id="exampleInputJudul1" placeholder="Masukkan Judul">
                </div>

                <div class="form-group">
                    <label for="exampleInputDeskripai1">Deskripsi</label>
                    <input name="deskripsi" type="text" class="form-control" id="exampleInputDeskripai1" placeholder="Masukkan Deskripsi">
                </div>

                <div class="form-group">
                    <label for="foto">Upload Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control file-upload-info" placeholder="Upload Image">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="button" class="btn btn-dark" onclick="window.history.back();">Cancel</button>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection