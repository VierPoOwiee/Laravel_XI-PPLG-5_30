@extends('layouts.admin')

@section('title', 'Data Siswa')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-user-graduate"></i> Data Siswa</h3>
          <div class="card-tools">
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah Siswa
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
              <input type="text" id="searchInput" class="form-control" placeholder="Cari siswa (NIS, Nama, NISN)...">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table id="studentTable" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NIS</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>NISN</th>
                  <th width="180px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($students as $student)
                <tr>
                  <td>{{ $student->id }}</td>
                  <td>{{ $student->nis }}</td>
                  <td>{{ $student->nama_lengkap }}</td>
                  <td>
                    @if($student->jenis_kelamin == 'L')
                      <span class="badge badge-primary">Laki-laki</span>
                    @else
                      <span class="badge badge-info">Perempuan</span>
                    @endif
                  </td>
                  <td>{{ $student->nisn }}</td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm" title="Lihat">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus data siswa {{ $student->nama_lengkap }}?')">
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
                  <td colspan="6" class="text-center">Tidak ada data siswa</td>
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
      $('#studentTable tbody tr').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });
</script>
@endpush
@endsection
