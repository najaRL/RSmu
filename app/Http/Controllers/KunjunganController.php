<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    // Menampilkan semua kunjungan
    public function index()
    {
        $kunjungans = Kunjungan::all();
        return response()->json($kunjungans);
    }

    // Menyimpan kunjungan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|integer|exists:pasiens,id',
            'dokter_id' => 'required|integer|exists:dokters,id',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
        ]);

        $kunjungan = Kunjungan::create($validated);

        return response()->json($kunjungan, 201);
    }

    // Menampilkan detail kunjungan berdasarkan ID
    public function show($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        return response()->json($kunjungan);
    }

    // Memperbarui data kunjungan
    public function update(Request $request, $id)
    {
        $kunjungan = Kunjungan::findOrFail($id);

        $validated = $request->validate([
            'pasien_id' => 'required|integer|exists:pasiens,id',
            'dokter_id' => 'required|integer|exists:dokters,id',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
        ]);

        $kunjungan->update($validated);

        return response()->json($kunjungan);
    }

    // Menghapus data kunjungan
    public function destroy($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->delete();

        return response()->json(['message' => 'Kunjungan berhasil dihapus.']);
    }
}