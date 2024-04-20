@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div>
        <h4 class="card-title">Tabel Peta</h4>
        <a href="{{ route('peta.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
        </div>

        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> NO </th>
                <th> NAMA </th>
                <th> LATITUDE </th>
                <th> LONGITUDE </th>
                <th> AKSI </th>
              </tr>
            </thead>
            <tbody>

                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loop->nama }}</td>
                        <td>{{ $loop->latitude }}</td>
                        <td>{{ $loop->longitude }}</td>
                    </tr>
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection