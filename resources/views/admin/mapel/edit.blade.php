@extends('layouts.admin')
@section('title', 'Edit Data Mata Pelajaran')
@section('content')
<div class="container-fluid">
  <h2>Edit Data Mata Pelajaran</h2>
  <form action="{{ route('mapels.update', $mapel->id) }}" method="POST">
    @csrf
    @method('PUT')
<div class="form-group mb-3">
      <label>ID Mapel</label>
      <input type="text" name="id_mapel" value="{{ $mapel->id_mapel }}" class="form-control" required>
    </div>
    <div class="form-group mb-3">
      <label>Nama Mapel</label>
      <input type="text" name="nama_mapel" value="{{ $mapel->nama_mapel }}" class="form-control" required>
    </div>
    <div class="form-group mb-3">
      <label>ID Guru</label>
      <input type="text" name="id_guru" value="{{ $mapel->id_guru }}" class="form-control" required>
    </div>
 <div class="form-group mb-3">
      <label>Nama Guru</label>
      <input type="text" name="nama_guru" value="{{ $mapel->nama_guru }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('mapels.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection

