@extends('layouts.admin')

@section('title', 'Data Mata Pelajaran')

@section('content')
<div class="container">
  <h1 class="mb-4">Data Mata Pelajaran</h1>
  <a href="{{ route('mapels.create') }}" class="btn btn-primary mb-3">+ Tambah Mata Pelajaran</a>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>ID Mapel</th>
        <th>Nama Mapel</th>
        <th>ID Guru</th>
        <th>Nama Guru</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($mapels as $mapel)
      <tr>
        <td>{{ $mapel->id }}</td>
        <td>{{ $mapel->id_mapel }}</td>
        <td>{{ $mapel->nama_mapel }}</td>
        <td>{{ $mapel->id_guru }}</td>
        <td>{{ $mapel->nama_guru }}</td>
        <td>
            <a href="{{ route('mapels.show', $mapel->id) }}" class="btn btn-info btn-sm">Lihat</a>
          <a href="{{ route('mapels.edit', $mapel->id) }}" class="btn btn-warning btn-sm">Edit</a>
         <form action="{{ route('mapels.destroy', $mapel->id) }}" method="POST" class="d-inline"
         onsubmit="return confirm('Apakah kamu yakin ingin menghapus data mata pelajaran ini?')">
         @csrf
         @method('DELETE')
         <button class="btn btn-danger btn-sm">Hapus</button>
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

