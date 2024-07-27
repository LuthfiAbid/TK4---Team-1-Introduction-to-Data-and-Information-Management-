<?php

namespace App\Models\penjualan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $primaryKey = 'id_penjualan';

    public $fillable = ['jumlah_penjualan', 'harga_jual', 'id_pelanggan'];
}
