@extends('adminlte::page')

@section('title', 'Data Jenjang')

@section('content_header') <h1>Data Jenjang</h1> @stop

@section('content') <div class="card">

    {{-- Header --}}
    <div class="card-header">
        <h3 class="card-title">Daftar Jenjang</h3>

        <div class="card-tools">
            <a href="{{ route('jenjang.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Jenjang
            </a>
        </div>
    </div>

    {{-- Pencarian dan Notifikasi --}}
    <div class="card-body pb-0">
        <form action="{{ route('jenjang.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama jenjang"
                    value="{{ request('search') }}"
                >

                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>

                    @if(request('search'))
                        <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
                            Reset
                        </a>
                    @endif
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

    {{-- Tabel Data Jenjang --}}
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Jenjang</th>
                    <th>Keterangan</th>
                    <th style="width: 160px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($jenjangs as $key => $jenjang)
                    <tr>
                        {{-- Nomor urut mengikuti halaman pagination --}}
                        <td>{{ $jenjangs->firstItem() + $key }}</td>
                        <td>{{ $jenjang->nama_jenjang }}</td>
                        <td>{{ $jenjang->keterangan ?? '-' }}</td>
                        <td>
                            {{-- Tombol Detail --}}
                            <a
                                href="{{ route('jenjang.show', $jenjang->id) }}"
                                class="btn btn-info btn-sm"
                                title="Detail"
                            >
                                <i class="bi bi-eye"></i>
                            </a>

                            {{-- Tombol Edit --}}
                            <a
                                href="{{ route('jenjang.edit', $jenjang->id) }}"
                                class="btn btn-warning btn-sm"
                                title="Edit"
                            >
                                <i class="bi bi-pencil"></i>
                            </a>

                            {{-- Tombol Hapus --}}
                            <form
                                action="{{ route('jenjang.destroy', $jenjang->id) }}"
                                method="POST"
                                style="display: inline-block;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data jenjang ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    title="Hapus"
                                >
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-3">
                            Data jenjang tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="card-footer clearfix">
            {{ $jenjangs->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>


@stop
