@extends('layouts.admin')

@section('title', 'Detail Mata Pelajaran')

@section('content')
<div class="container-fluid">
  <h1 class="mb-3">Detail Mata Pelajaran</h1>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <td>{{ $mapel->id }}</td>
        </tr>
        <tr>
          <th>ID Mapel</th>
          <td>{{ $mapel->id_mapel }}</td>
        </tr>
        <tr>
          <th>Nama Mapel</th>
          <td>{{ $mapel->nama_mapel }}</td>
        </tr>
        <tr>
          <th>ID Guru</th>
          <td>{{ $mapel->id_guru }}</td>
        </tr>
        <tr>
          <th>Nama Guru</th>
          <td>{{ $mapel->nama_guru }}</td>
        </tr>
      </table>

      <a href="{{ route('mapels.index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('mapels.edit', $mapel->id) }}" class="btn btn-warning">Edit</a>
    </div>
  </div>
</div>
@endsection

