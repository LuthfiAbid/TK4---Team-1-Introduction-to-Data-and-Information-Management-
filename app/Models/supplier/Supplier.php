<?php

namespace App\Models\supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'hak_akses';

    protected $primaryKey = 'id_akses';

    protected $fillable = ['nama_akses', 'keterangan'];
}
