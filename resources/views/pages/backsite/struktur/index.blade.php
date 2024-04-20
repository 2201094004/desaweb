@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div>
                <h4 class="card-title">Tabel Struktur Organisasi</h4>
                <a href="{{ route('struktur.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
            </div>
            <p></p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> NO </th>
                            <th> NAMA ORGANISASI </th>
                            <th> JABATAN </th>
                            <th> NAMA PENGURUS </th>
                            <th> FOTO </th>
                            <th> AKSI </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_organisasi }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->nama_pengurus }}</td>
                            <td class="text-center">
                                @if ($item->foto_pengurus)
                               
                                <img src="{{ asset('/storage/foto_pengurus/' . $item->foto_pengurus) }}" alt="Foto" style="width: 150px; height: 150px;">

                                @endif
                            </td>
                            <td>
                              <div class="d-flex align-items-center justify-content-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('struktur.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('struktur.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
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