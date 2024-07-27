<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = DB::select("SELECT id_pengguna, nama_pengguna, nama_depan, nama_belakang, no_hp, alamat FROM pengguna");

        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = DB::select("SELECT id_akses, nama_akses FROM hak_akses");
        return view('pengguna.form', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_akses' => 'required',
            'nama_pengguna' => 'required',
            'password' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        try {
            $password = Hash::make($request->password);
            DB::insert("INSERT INTO pengguna (nama_pengguna, password, nama_depan, nama_belakang, no_hp, alamat, id_akses) VALUES (?, ?, ?, ?, ?, ?, ?)", [$request->nama_pengguna, $password, $request->nama_depan, $request->nama_belakang, $request->no_hp, $request->alamat, $request->id_akses]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $role = DB::select("SELECT id_akses, nama_akses FROM hak_akses");
            $pengguna = DB::select("SELECT id_pengguna, nama_pengguna, password ,nama_depan, nama_belakang, no_hp, alamat, id_akses FROM pengguna WHERE id_pengguna = ?", [$id]);
            if (!empty($pengguna)) {
                $pengguna = $pengguna[0];
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        return view('pengguna.form', compact('pengguna', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pengguna)
    {
        $request->validate([
            'nama_pengguna' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        try {
            if (!empty($request->password)) {
                $password = Hash::make($request->password);
                DB::update("UPDATE pengguna SET nama_pengguna = ?, password = ?, nama_depan = ?, nama_belakang = ?, no_hp = ?, alamat = ?, id_akses = ? WHERE id_pengguna = ?", [$request->nama_pengguna, $password, $request->nama_depan, $request->nama_belakang, $request->no_hp, $request->alamat, $request->id_akses, $id_pengguna]);
            } else {
                DB::update("UPDATE pengguna SET nama_pengguna = ?, nama_depan = ?, nama_belakang = ?, no_hp = ?, alamat = ?, id_akses = ? WHERE id_pengguna = ?", [$request->nama_pengguna, $request->nama_depan, $request->nama_belakang, $request->no_hp, $request->alamat, $request->id_akses, $id_pengguna]);
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pengguna)
    {
        try {
            DB::delete("DELETE FROM pengguna WHERE id_pengguna = ?", [$id_pengguna]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
