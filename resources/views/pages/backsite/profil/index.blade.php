@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div>
        <h4 class="card-title">Tabel Profil Desa</h4>
        <a href="{{ route('profil.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
        </div>

        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> NO </th>
                <th> NAMA </th>
                <th> DESKRIPSI </th>
                <th> ALAMAT </th>
                <th> Telpon </th>
                <th> Email </th>
                <th> AKSI </th>
              </tr>
            </thead>
            <tbody>

                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_desa }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>{{ $item->email }}</td>

                        <td>
                          <div class="d-flex align-items-center justify-content-center">
                              <a href="{{ route('profil.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>                                                    
                              <form id="deleteForm{{ $item->id }}" action="{{ route('profil.destroy', $item->id) }}" method="POST" style="display: inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $item->id }}')">Delete</button>
                              </form>
                          </div>

                    </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection