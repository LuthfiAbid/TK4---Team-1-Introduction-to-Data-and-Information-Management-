<?php

namespace App\Http\Controllers\pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = DB::select("SELECT id_pelanggan, nama_pelanggan, alamat FROM pelanggan");

        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
        ]);

        try {
            DB::insert("INSERT INTO pelanggan (nama_pelanggan, alamat) VALUES (?, ?)", [$request->nama_pelanggan, $request->alamat]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $pelanggan = DB::select("SELECT id_pelanggan, nama_pelanggan, alamat FROM pelanggan WHERE id_pelanggan = ?", [$id]);
            if (!empty($pelanggan)) {
                $pelanggan = $pelanggan[0];
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return view('pelanggan.form', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pelanggan)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
        ]);

        try {
            DB::update("UPDATE pelanggan SET nama_pelanggan = ?, alamat = ? WHERE id_pelanggan = ?", [$request->nama_pelanggan, $request->alamat, $id_pelanggan]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pelanggan)
    {
        try {
            DB::delete("DELETE FROM pelanggan WHERE id_pelanggan = ?", [$id_pelanggan]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
