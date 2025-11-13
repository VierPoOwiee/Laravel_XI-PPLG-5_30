@extends('layouts.admin')

@section('title', 'Data Mata Pelajaran')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-book"></i> Data Mata Pelajaran</h3>
          <div class="card-tools">
            <a href="{{ route('mapels.create') }}" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah Mata Pelajaran
            </a>
          </div>
        </div>
        
        <div class="card-body">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <!-- Search Box -->
          <div class="mb-3">
            <div class="input-group">
              <input type="text" id="searchInput" class="form-control" placeholder="Cari mata pelajaran (ID Mapel, Nama Mapel, Nama Guru)...">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table id="mapelTable" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>ID Mapel</th>
                  <th>Nama Mapel</th>
                  <th>ID Guru</th>
                  <th>Nama Guru</th>
                  <th width="180px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($mapels as $mapel)
                <tr>
                  <td>{{ $mapel->id }}</td>
                  <td><span class="badge badge-secondary">{{ $mapel->id_mapel }}</span></td>
                  <td><strong>{{ $mapel->nama_mapel }}</strong></td>
                  <td><span class="badge badge-info">{{ $mapel->id_guru }}</span></td>
                  <td>{{ $mapel->nama_guru }}</td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="{{ route('mapels.show', $mapel->id) }}" class="btn btn-info btn-sm" title="Lihat">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('mapels.edit', $mapel->id) }}" class="btn btn-warning btn-sm" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{ route('mapels.destroy', $mapel->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus data mata pelajaran {{ $mapel->nama_mapel }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center">Tidak ada data mata pelajaran</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $(document).ready(function() {
    // Search functionality
    $('#searchInput').on('keyup', function() {
      var value = $(this).val().toLowerCase();
      $('#mapelTable tbody tr').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });
</script>
@endpush
@endsection
