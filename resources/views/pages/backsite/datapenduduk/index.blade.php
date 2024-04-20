@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div>
            <h4 class="card-title">Tabel Data Penduduk</h4>
            <a href="{{ route('datapenduduk.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
        </div>
        
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> NO </th>
                <th> NAMA </th>
                <th> JENIS KELAMIN </th>
                <th> TANGGAL LAHIR </th>
                <th> ALAMAT </th>
                <th> PEKERJAAN </th>
                <th> AKSI </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->pekerjaan }}</td>
                        <td>
                          <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('datapenduduk.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>                                                    
                            <form id="deleteForm{{ $item->id }}" action="{{ route('datapenduduk.destroy', $item->id) }}" method="POST" style="display: inline;">
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