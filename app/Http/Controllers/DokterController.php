<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    // Tampilkan semua dokter
    public function index()
    {
        $dokters = Dokter::all();
        return response()->json($dokters);
    }

    // Simpan dokter baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'spesialis' => 'required|string|max:100',
            'jadwal_praktek' => 'required|string|max:50',
            'no_str' => 'required|string|max:50',
        ]);

        $dokter = Dokter::create($validated);

        return response()->json($dokter, 201);
    }

    // Tampilkan detail dokter berdasarkan ID
    public function show($id)
    {
        $dokter = Dokter::findOrFail($id);
        return response()->json($dokter);
    }

    // Update data dokter
    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'spesialis' => 'required|string|max:100',
            'jadwal_praktek' => 'required|string|max:50',
            'no_str' => 'required|string|max:50',
        ]);

        $dokter->update($validated);

        return response()->json($dokter);
    }

    // Hapus dokter
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return response()->json(['message' => 'Data dokter berhasil dihapus.']);
    }
}
