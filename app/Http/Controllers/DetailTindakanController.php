<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTindakan;


class DetailTindakanController extends Controller
{
    // Menampilkan semua detail tindakan
    public function index()
    {
        $Detail_Tindakan = DetailTindakan::all();
        return response()->json($Detail_Tindakan);
    }

    // Menyimpan detail tindakan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kunjungan_id' => 'required|integer|exists:kunjungans,id',
            'tindakan_id' => 'required|integer|exists:tindakans,id',
            'keterangan' => 'required|string',
            'keterangan_subtotal' => 'required|numeric|min:0',
        ]);

        $Detail_Tindakan = DetailTindakan::create($validated);

        return response()->json($Detail_Tindakan, 201);
    }

    // Menampilkan detail berdasarkan ID
    public function show($id)
    {
        $Detail_Tindakan = DetailTindakan::findOrFail($id);
        return response()->json($Detail_Tindakan);
    }

    // Memperbarui data detail
    public function update(Request $request, $id)
    {
        $Detail_Tindakan = DetailTindakan::findOrFail($id);

        $validated = $request->validate([
            'kunjungan_id' => 'required|integer|exists:kunjungans,id',
            'tindakan_id' => 'required|integer|exists:tindakans,id',
            'keterangan' => 'required|string',
            'keterangan_subtotal' => 'required|numeric|min:0',
        ]);

        $Detail_Tindakan->update($validated);

        return response()->json($Detail_Tindakan);
    }

    // Menghapus data detail
    public function destroy($id)
    {
        $Detail_Tindakans = DetailTindakan::findOrFail($id);
        $Detail_Tindakans->delete();

        return response()->json(['message' => 'Detail tindakan berhasil dihapus.']);
    }
}