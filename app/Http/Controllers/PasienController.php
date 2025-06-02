<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Menampilkan semua data pasien
    public function index()
    {
        $pasiens = Pasien::all();
        return response()->json($pasiens);
    }

    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|max:20|unique:pasiens',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        $pasien = Pasien::create($validated);

        return response()->json($pasien, 201);
    }

    // Menampilkan detail pasien berdasarkan ID
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return response()->json($pasien);
    }

    // Memperbarui data pasien
    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|max:20|unique:pasiens,nik,' . $id,
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        $pasien->update($validated);

        return response()->json($pasien);
    }

    // Menghapus data pasien
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return response()->json(['message' => 'Pasien berhasil dihapus.']);
    }
}

