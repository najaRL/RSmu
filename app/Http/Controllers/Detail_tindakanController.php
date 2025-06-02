<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_tindakan;


class Detail_tindakanController extends Controller
{
    // Menampilkan semua detail tindakan
    public function index()
    {
        $details = Detail_tindakan::all();
        return response()->json($details);
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

        $detail = Detail_tindakan::create($validated);

        return response()->json($detail, 201);
    }

    // Menampilkan detail berdasarkan ID
    public function show($id)
    {
        $detail = Detail_tindakan::findOrFail($id);
        return response()->json($detail);
    }

    // Memperbarui data detail
    public function update(Request $request, $id)
    {
        $detail = Detail_tindakan::findOrFail($id);

        $validated = $request->validate([
            'kunjungan_id' => 'required|integer|exists:kunjungans,id',
            'tindakan_id' => 'required|integer|exists:tindakans,id',
            'keterangan' => 'required|string',
            'keterangan_subtotal' => 'required|numeric|min:0',
        ]);

        $detail->update($validated);

        return response()->json($detail);
    }

    // Menghapus data detail
    public function destroy($id)
    {
        $detail = Detail_tindakan::findOrFail($id);
        $detail->delete();

        return response()->json(['message' => 'Detail tindakan berhasil dihapus.']);
    }
}