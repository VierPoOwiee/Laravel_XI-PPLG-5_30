@extends('layouts.admin')
@section('title', 'Tambah Mata Pelajaran')

@section('content')
<div class="container">
  <h1>Tambah Data Mata Pelajaran</h1>
  <form action="{{ route('mapels.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>ID Mapel</label>
      <input type="text" name="id_mapel" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nama Mapel</label>
      <input type="text" name="nama_mapel" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>ID Guru</label>
      <input type="text" name="id_guru" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nama Guru</label>
      <input type="text" name="nama_guru" class="form-control" required>
    </div>
 <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</div>
@endsection

