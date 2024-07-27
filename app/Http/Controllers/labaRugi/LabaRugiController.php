<?php

namespace App\Http\Controllers\labaRugi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LabaRugiController extends Controller
{
    public function index()
    {
        $labarugi = DB::select("SELECT
        A.nama_barang,
        SUM(B.jumlah_pembelian * B.harga_beli) AS total_pembelian,
        SUM(C.jumlah_penjualan * C.harga_jual) AS total_penjualan
        FROM barang A
        LEFT JOIN pembelian B ON B.id_barang = A.id_barang
        LEFT JOIN penjualan C ON C. id_barang = A.id_barang
        GROUP BY A.nama_barang
        ORDER BY A.id_barang");

        // dd($labarugi);

        return view('labarugi.index', compact('labarugi'));
    }
}
