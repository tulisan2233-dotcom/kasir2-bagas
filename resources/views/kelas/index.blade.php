
@extends('adminlte::page')

@section('title', 'Data kelas')

@section('content_header')
    <h1>Data kelas</h1>
@stop

@section('content')
    <div class="card">
        {{-- Header dengan Style AdminLTE --}}
        <div class="card-header">
            <h3 class="card-title">Daftar kelas</h3>
            <div class="card-tools">
                <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus"></i> Tambah kelas
                </a>
            </div>
        </div>

        {{-- Bagian Pencarian & Alert --}}
        <div class="card-body pb-0">
            <form action="{{ route('kelas.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Cari nama kelas"
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        {{-- Bagian Tabel --}}
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama Kelas</th>
                        <th>Jenjang</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $key => $kela)
                    <tr>
                        <td>{{ $kelas->firstItem() + $key }}</td>
                        <td>{{ $kela->nama_kelas }}</td>
                        <td>{{ $kela->jenjang->nama_jenjang }}</td>
                        <td>{{ $kela->jurusan->nama_jurusan }}</td>
                        <td>{{ $kela->status }}</td>
                        <td>
                            {{-- Tombol Aksi --}}
                            <a class="btn btn-info btn-sm"
                                href="{{ route('kelas.show', $kela->id) }}" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('kelas.edit', $kela->id) }}"
                                class="btn btn-warning btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('kelas.destroy', $kela->id) }}"
                                method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                    title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="card-footer clearfix">
            {!! $kelas->appends(request()->query())->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@stop
