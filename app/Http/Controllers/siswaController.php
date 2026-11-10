<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Filter search
        $siswa = siswa::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nis', 'like', "%{$search}%")
                      ->orWhere('nama', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Validasi sekaligus simpan hasilnya ke variabel $data
        $data = $request->validate([
            'nis'            => 'required|string|max:20|unique:siswa',
            'nama'           => 'required|string|max:255',
            'jenis_kelamin'  => 'required|string|max:20',
            'alamat'         => 'nullable|string',
            'kelas_id'       => 'required|integer',
            'status'         => 'nullable|string|max:100',
        ]);

        // Simpan data langsung
        siswa::create($data);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, siswa $siswa)
    {
        // Validasi data
        $data = $request->validate([
            'nis'           => 'required|string|max:20|unique:siswa,nis,' . $siswa->id,
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:20',
            'alamat'        => 'nullable|string',
            'kelas_id'      => 'required|integer',
            'status'        => 'nullable|string|max:100',
        ]);

        // Update data langsung
        $siswa->update($data);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function show(siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    public function destroy(siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
