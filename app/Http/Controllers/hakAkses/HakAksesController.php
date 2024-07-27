<?php

namespace App\Http\Controllers\hakAkses;

use App\Http\Controllers\Controller;
use App\Models\hakAkses\HakAkses;
use Illuminate\Http\Request;
use DB;

class HakAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akses = DB::select("SELECT id_akses, nama_akses, keterangan FROM hak_akses");

        return view('hakAkses.index', compact('akses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hakAkses.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_akses' => 'required',
            'keterangan' => 'required',
        ]);

        try {
            DB::insert("INSERT INTO hak_akses (nama_akses, keterangan) VALUES (?, ?)", [$request->nama_akses, $request->keterangan]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        // HakAkses::create($request->all());

        return redirect()->route('akses.index')->with('success', 'Hak akses berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $akses = DB::select("SELECT id_akses, nama_akses, keterangan FROM hak_akses WHERE id_akses = ? LIMIT 1", [$id]);
            if (!empty($akses)) {
                $akses = $akses[0];
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return view('hakAkses.form', compact('akses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_akses)
    {
        $request->validate([
            'nama_akses' => 'required',
            'keterangan' => 'required',
        ]);

        try {
            DB::update("UPDATE hak_akses SET nama_akses = ?, keterangan = ? WHERE id_akses = ?", [$request->nama_akses, $request->keterangan, $id_akses]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('akses.index')->with('success', 'Hak akses berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_akses)
    {
        try {
            DB::delete("DELETE FROM hak_akses WHERE id_akses = ?", [$id_akses]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('akses.index')->with('success', 'Hak akses berhasil dihapus.');
    }
}
