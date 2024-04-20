@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div>
                <h4 class="card-title">Tabel Kegiatan Desa</h4>
                <a href="{{ route('kegiatan.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> NO </th>
                            <th> NAMA KEGIATAN </th>
                            <th> TANGGAL </th>
                            <th> DESKRIPSI </th>
                            <th> AKSI </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $kegiatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kegiatan->nama_kegiatan }}</td>
                            <td>{{ $kegiatan->tanggal }}</td>
                            <td>{{ $kegiatan->deskripsi }}</td>

                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>                                                    
                                    <form id="deleteForm{{ $kegiatan->id }}" action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                  </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        @endsection
