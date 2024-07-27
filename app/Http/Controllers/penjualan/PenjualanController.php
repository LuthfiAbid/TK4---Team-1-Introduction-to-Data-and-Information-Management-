<?php

namespace App\Http\Controllers\penjualan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = DB::select("SELECT A.id_penjualan, A.jumlah_penjualan, A.harga_jual, B.nama_pelanggan FROM penjualan A LEFT JOIN pelanggan B ON B.id_pelanggan = A.id_pelanggan");

        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = DB::select("SELECT id_pelanggan, nama_pelanggan FROM pelanggan");
        return view('penjualan.form', compact('pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah_penjualan' => 'required',
            'harga_jual' => 'required',
            'id_pelanggan' => 'required',
        ]);

        try {
            DB::insert("INSERT INTO penjualan (jumlah_penjualan, harga_jual, id_pelanggan) VALUES (?, ?, ?)", [$request->jumlah_penjualan, $request->harga_jual, $request->id_pelanggan]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $pelanggan = DB::select("SELECT id_pelanggan, nama_pelanggan FROM pelanggan");
            $penjualan = DB::select("SELECT id_penjualan, jumlah_penjualan, harga_jual, id_pelanggan FROM penjualan WHERE id_penjualan = ?", [$id]);
            if (!empty($penjualan)) {
                $penjualan = $penjualan[0];
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return view('penjualan.form', compact('pelanggan', 'penjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_penjualan)
    {
        $request->validate([
            'jumlah_penjualan' => 'required',
            'harga_jual' => 'required',
            'id_pelanggan' => 'required',
        ]);

        try {
            DB::update("UPDATE penjualan SET jumlah_penjualan = ?, harga_jual = ?, id_pelanggan = ? WHERE id_penjualan = ?", [$request->jumlah_penjualan, $request->harga_jual, $request->id_pelanggan, $request->id]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_penjualan)
    {
        try {
            DB::delete("DELETE FROM penjualan WHERE id_penjualan = ?", [$id_penjualan]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}
