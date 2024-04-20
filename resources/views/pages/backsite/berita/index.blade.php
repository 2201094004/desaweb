@extends('layout.master')

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div>
        <h4 class="card-title">Tabel Berita Desa</h4>
        <a href="{{ route('berita.create') }}" class="btn btn-primary btn-fw">Tambah Data</a>
        </div>

        <p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> NO </th>
                <th> JUDUL </th>
                <th> TANGGAL </th>
                <th> KONTEN </th>
                <th> AKSI </th>
              </tr>
            </thead>
            <tbody>

                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->konten }}</td>
                          <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>                                                    
                                <form id="deleteForm{{ $item->id }}" action="{{ route('berita.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $item->id }}')">Delete</button>
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
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>

@endsection