@extends('adminlte::page')

@section('title', 'Edit kelas')

@section('content_header')
    <h1>Edit kelas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kelas.update', $kela->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="{{ $kela->nama_kelas }}" required>
                </div>

                <div class="form-group">
                    <label for="nama_jenjang">Jenjang</label>
                    <input type="text" name="jenjang_id" class="form-control" id="jenjang_id" value="{{ $kela->jenjang->nama_jenjang }}" required>
                </div>

                <div class="form-group">
                    <label for="nama_jurusan">Jurusan</label>
                    <input type="text" name="jurusan_id" class="form-control" id="jurusan_id" value="{{ $kela->jurusan->nama_jurusan }}" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="aktif" {{ $kela->status === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $kela->status === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop
