<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tindakan;

class TindakanController extends Controller
{
    // Menampilkan semua tindakan
    public function index()
    {
        $tindakans = Tindakan::all();
        return response()->json($tindakans);
    }

    // Menyimpan tindakan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:100',
            'biaya' => 'required|numeric|min:0',
            'kode_icd' => 'required|string|max:20',
        ]);

        $tindakan = Tindakan::create($validated);

        return response()->json($tindakan, 201);
    }

    // Menampilkan detail tindakan berdasarkan ID
    public function show($id)
    {
        $tindakan = Tindakan::findOrFail($id);
        return response()->json($tindakan);
    }

    // Memperbarui data tindakan
    public function update(Request $request, $id)
    {
        $tindakan = Tindakan::findOrFail($id);

        $validated = $request->validate([
            'nama_tindakan' => 'required|string|max:100',
            'biaya' => 'required|numeric|min:0',
            'kode_icd' => 'required|string|max:20',
        ]);

        $tindakan->update($validated);

        return response()->json($tindakan);
    }

    // Menghapus tindakan
    public function destroy($id)
    {
        $tindakan = Tindakan::findOrFail($id);
        $tindakan->delete();

        return response()->json(['message' => 'Tindakan berhasil dihapus.']);
    }
}