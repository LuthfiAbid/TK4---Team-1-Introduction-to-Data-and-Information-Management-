<?php

namespace App\Http\Controllers\pembelian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = DB::select("SELECT A.id_pembelian, A.jumlah_pembelian, A.harga_beli, B.nama_barang FROM pembelian A LEFT JOIN barang B ON B.id_barang = A.id_barang");

        return view('pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = DB::select("SELECT id_supplier, nama_supplier FROM supplier");
        return view('pembelian.form', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah_pembelian' => 'required',
            'harga_beli' => 'required',
            'id_supplier' => 'required',
        ]);

        try {
            DB::insert("INSERT INTO pembelian (jumlah_pembelian, harga_beli, id_supplier) VALUES (?, ?, ?)", [$request->jumlah_pembelian, $request->harga_beli, $request->id_supplier]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $supplier = DB::select("SELECT id_supplier, nama_supplier FROM supplier");
            $pembelian = DB::select("SELECT id_pembelian, jumlah_pembelian, harga_beli, id_supplier FROM pembelian WHERE id_pembelian = ?", [$id]);
            if (!empty($pembelian)) {
                $pembelian = $pembelian[0];
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return view('pembelian.form', compact('supplier', 'pembelian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pembelian)
    {
        $request->validate([
            'jumlah_pembelian' => 'required',
            'harga_beli' => 'required',
            'id_supplier' => 'required',
        ]);

        try {
            DB::update("UPDATE pembelian SET jumlah_pembelian = ?, harga_beli = ?, id_supplier = ? WHERE id_pembelian = ?", [$request->jumlah_pembelian, $request->harga_beli, $request->id_supplier, $request->id]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pembelian)
    {
        try {
            DB::delete("DELETE FROM pembelian WHERE id_pembelian = ?", [$id_pembelian]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus.');
    }
}
