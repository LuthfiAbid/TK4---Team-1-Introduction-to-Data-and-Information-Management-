<?php

namespace App\Models\pembelian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $primaryKey = 'id_pembelian';

    public $fillable = ['jumlah_pembelian', 'harga_beli', 'id_supplier'];
}
