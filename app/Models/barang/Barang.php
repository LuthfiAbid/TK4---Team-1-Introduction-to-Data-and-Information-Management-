<?php

namespace App\Models\barang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'id_barang';

    public $fillable = ['nama_barang', 'keterangan', 'satuan', 'id_pengguna'];
}
