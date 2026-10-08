<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;

class jurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
	    //Filter search
        $jurusan = jurusan::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_jurusan', 'like', "%{$search}%")
                      ->orWhere('kode_jurusan', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('jurusan.index', compact('jurusan'));
    }

     public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        // Validasi sekaligus simpan hasilnya ke variabel $data
        $data = $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|unique:jurusan|max:20',
            'keterangan'   => 'nullable|string|max:255',
            'status'       => 'nullable|string|max:100',
        ]);

        // Simpan data langsung (tanpa perlu definisikan satu-satu)
        jurusan::create($data);

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    public function edit(jurusan $jurusan)
    {
        return view('jurusan.edit',compact('jurusan'));
    }

    public function update(Request $request, jurusan $jurusan)
    {
        // Validasi data
        $data = $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:20|unique:jurusan,kode_jurusan,'.$jurusan->id,
            'keterangan'   => 'nullable|string|max:255',
            'status'       => 'nullable|string|max:100',
        ]);

        // Update data langsung
        $jurusan->update($data);

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil diperbarui.');
    }

    public function show(jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    public function destroy(jurusan $jurusan)
    {

        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil dihapus.');
    }
}
