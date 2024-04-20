@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div>
        <h4 class="card-title">Tabel Visi Misi</h4>
        <a href="{{ route('visimisi.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
        </div>

        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> NO </th>
                <th> JUDUL </th>
                <th> DESKRIPSI </th>
                <th> AKSI </th>
              </tr>
            </thead>
            <tbody>

                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->deskripsi }}</td>

                        <td><div class="d-flex align-items-center justify-content-center">
                          <a href="{{ route('visimisi.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>                                                    
                          <form id="deleteForm{{ $item->id }}" action="{{ route('visimisi.destroy', $item->id) }}" method="POST" style="display: inline;">
                              <form id="deleteForm{{ $item->id }}" action="{{ route('visimisi.destroy', $item->id) }}" method="POST" style="display: inline;">
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