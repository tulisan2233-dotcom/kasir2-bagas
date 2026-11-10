@extends('adminlte::page')

@section('title', 'Tambah Kelas')

@section('content_header')
    <h1>Tambah Kelas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf

                {{-- Nama Kelas --}}
                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas"
                           class="form-control @error('nama_kelas') is-invalid @enderror"
                           value="{{ old('nama_kelas') }}" autocomplete="off" required>
                    @error('nama_kelas')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Jenjang --}}
                <div class="form-group">
                    <label for="jenjang_id">Jenjang</label>
                    <select name="jenjang_id" id="jenjang_id"
                            class="form-control @error('jenjang_id') is-invalid @enderror" required>
                        <option value="">Pilih Jenjang</option>
                        @foreach($jenjang as $j)
                            <option value="{{ $j->id }}" {{ old('jenjang_id') == $j->id ? 'selected' : '' }}>
                                {{ $j->nama_jenjang }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenjang_id')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Jurusan --}}
                <div class="form-group">
                    <label for="jurusan_id">Jurusan</label>
                    <select name="jurusan_id" id="jurusan_id"
                            class="form-control @error('jurusan_id') is-invalid @enderror" required>
                        <option value="">Pilih Jurusan</option>
                        @foreach($jurusan as $j)
                            <option value="{{ $j->id }}" {{ old('jurusan_id') == $j->id ? 'selected' : '' }}>
                                {{ $j->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                    @error('jurusan_id')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status"
                            class="form-control @error('status') is-invalid @enderror" required>
                        <option value="">Pilih Status</option>
                        <option value="aktif" {{ old('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop
