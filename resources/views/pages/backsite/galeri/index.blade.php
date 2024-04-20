@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div>
                <h4 class="card-title">Tabel Galeri Desa</h4>
                <a href="{{ route('galeri.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
            </div>
            <p></p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> NO </th>
                            <th> JUDUL </th>
                            <th> DESKRIPSI </th>
                            <th> FOTO </th>
                            <th> AKSI </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td class="text-center">
                                @if ($item->foto)
                                <img src="{{ asset('/storage/foto/' . $item->foto_kepala_desa) }}" alt="Foto" style="width: 150px; height: 150px;">
                                @endif
                            </td>

                            <td>
                              <div class="d-flex align-items-center justify-content-center">
                                <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" action="{{ route('galeri.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('galeri.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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