@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div>
                <h4 class="card-title">Tabel Kepala Desa</h4>
                <a href="{{ route('kepaladesa.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> NO </th>
                            <th> NAMA Kepala Desa</th>
                            <th> Foto Kepala Desa </th>
                            <th> DESKRIPSI </th>
                            <th> AKSI </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kepala_desa }}</td>
                            <td class="text-center">
                                @if ($item->foto_kepala_desa)
                                <img src="{{ asset('/storage/foto_kepala_desa/' . $item->foto_kepala_desa) }}" alt="Foto_kepala_desa" style="width: 150px; height: 150px;">
                                @endif
                            </td>
                            <td>{{ $item->deskripsi }}</td>

                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('kepaladesa.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>                                                    
                                    <form id="deleteForm{{ $item->id }}" action="{{ route('kepaladesa.destroy', $item->id) }}" method="POST" style="display: inline;">
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
