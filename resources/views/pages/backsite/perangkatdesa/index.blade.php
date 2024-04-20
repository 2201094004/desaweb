@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div>
        <h4 class="card-title">Tabel Perangkat Desa</h4>
        <a href="{{ route('perangkatdesa.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
        </div>

        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> NO </th>
                <th> NAMA </th>
                <th> FOTO </th>
                <th> JABATAN </th>
                <th> DESKRIPSI </th>
                <th> AKSI </th>
              </tr>
            </thead>
            <tbody>

                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loop->nama }}</td>
                        <td>{{ $loop->foto }}</td>
                        <td>{{ $loop->jabatan }}</td>
                        <td>{{ $loop->deskripsi }}</td>
                    </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection