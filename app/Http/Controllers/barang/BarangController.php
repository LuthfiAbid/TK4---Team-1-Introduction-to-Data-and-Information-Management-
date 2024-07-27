<?php

namespace App\Http\Controllers\barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = DB::select("SELECT A.id_barang, A.nama_barang, A.keterangan, A.satuan, B.nama_pengguna FROM barang A LEFT JOIN pengguna B ON B.id_pengguna = A.id_pengguna");

        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengguna = DB::select("SELECT id_pengguna, nama_pengguna FROM pengguna");
        $role = DB::select("SELECT id_akses, nama_akses FROM hak_akses");
        return view('barang.form', compact('role', 'pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'keterangan' => 'required',
            'satuan' => 'required',
            'id_pengguna' => 'required',
        ]);

        try {
            DB::insert("INSERT INTO barang (nama_barang, keterangan, satuan, id_pengguna) VALUES (?, ?, ?, ?)", [$request->nama_barang, $request->keterangan, $request->satuan, $request->id_pengguna]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $pengguna = DB::select("SELECT id_pengguna, nama_pengguna FROM pengguna");
            $barang = DB::select("SELECT id_barang, nama_barang, keterangan, satuan, id_pengguna FROM barang WHERE id_barang = ?", [$id]);
            if (!empty($barang)) {
                $barang = $barang[0];
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return view('barang.form', compact('barang', 'pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'keterangan' => 'required',
            'satuan' => 'required',
            'id_pengguna' => 'required',
        ]);

        try {
            DB::update("UPDATE barang SET nama_barang = ?, keterangan = ?, satuan = ?, id_pengguna = ? WHERE id_barang = ?", [$request->nama_barang, $request->keterangan, $request->satuan, $request->id_pengguna, $request->id]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_barang)
    {
        try {
            DB::delete("DELETE FROM barang WHERE id_barang = ?", [$id_barang]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
