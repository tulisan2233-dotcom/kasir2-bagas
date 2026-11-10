<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Filter search
        $kelas = kelas::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_kelas', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $jurusan = \App\Models\jurusan::all();
        $jenjang = \App\Models\jenjang::all();

        return view('kelas.create', compact('jurusan', 'jenjang'));
    }

    public function store(Request $request)
    {
        // Validasi sekaligus simpan hasilnya ke variabel $data
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'jenjang_id' => 'required|integer',
            'jurusan_id' => 'required|integer',
            'status'     => 'nullable|string|max:100',
        ]);

        // Simpan data langsung
        kelas::create($data);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(kelas $kela)
    {
        return view('kelas.edit', compact('kela'));
    }

    public function update(Request $request, kelas $kela)
    {
        // Validasi data
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'jenjang_id' => 'required|integer',
            'jurusan_id' => 'required|integer',
            'status'     => 'nullable|string|max:100',
        ]);

        // Update data langsung
        $kela->update($data);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function show(kelas $kelas1)
    {
        return view('kelas.show', compact('kela'));
    }

    public function destroy(kelas $kelas1)
    {
        $kelas1->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}
