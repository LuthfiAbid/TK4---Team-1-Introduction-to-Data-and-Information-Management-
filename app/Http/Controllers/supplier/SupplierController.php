<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = DB::select("SELECT id_supplier, nama_supplier, alamat FROM supplier");

        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
        ]);

        try {
            DB::insert("INSERT INTO supplier (nama_supplier, alamat) VALUES (?, ?)", [$request->nama_supplier, $request->alamat]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('supplier.index')->with('success', 'Pelanggan berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $supplier = DB::select("SELECT id_supplier, nama_supplier, alamat FROM supplier WHERE id_supplier = ?", [$id]);
            if (!empty($supplier)) {
                $supplier = $supplier[0];
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return view('supplier.form', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_supplier)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
        ]);

        try {
            DB::update("UPDATE supplier SET nama_supplier = ?, alamat = ? WHERE id_supplier = ?", [$request->nama_supplier, $request->alamat, $id_supplier]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('supplier.index')->with('success', 'Pelanggan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_supplier)
    {
        try {
            DB::delete("DELETE FROM supplier WHERE id_supplier = ?", [$id_supplier]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('supplier.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
