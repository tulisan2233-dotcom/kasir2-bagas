<?php

namespace App\Http\Controllers;

use App\Models\jenjang;
use Illuminate\Http\Request;

class jenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
	    //Filter search
        $jenjang = jenjang::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_jenjang', 'like', "%{$search}%")
                      ->orWhere('keterangan', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('jenjang.index', compact('jenjang'));
    }

     public function create()
    {
        return view('jenjang.create');
    }

    public function store(Request $request)
    {
        // Validasi sekaligus simpan hasilnya ke variabel $data
        $data = $request->validate([
            'nama_jenjang' => 'required|string|max:255',
            'keterangan'   => 'nullable|string|max:255',
        ]);

        // Simpan data langsung (tanpa perlu definisikan satu-satu)
        jenjang::create($data);

        return redirect()->route('jenjang.index')->with('success', 'Data jenjang berhasil ditambahkan.');
    }

    public function edit(jenjang $jenjang)
    {
        return view('jenjang.edit',compact('jenjang'));
    }

    public function update(Request $request, jenjang $jenjang)
    {
        // Validasi data
        $data = $request->validate([
            'nama_jenjang' => 'required|string|max:255',
            'keterangan'   => 'nullable|string|max:255',
        ]);

        // Update data langsung
        $jenjang->update($data);

        return redirect()->route('jenjang.index')->with('success', 'Data jenjang berhasil diperbarui.');
    }

    public function show(jenjang $jenjang)
    {
        return view('jenjang.show', compact('jenjang'));
    }

    public function destroy(jenjang $jenjang)
    {

        $jenjang->delete();

        return redirect()->route('jenjang.index')->with('success', 'Data jenjang berhasil dihapus.');
    }
}
