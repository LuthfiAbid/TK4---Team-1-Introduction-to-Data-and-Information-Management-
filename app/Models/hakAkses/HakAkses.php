<?php

namespace App\Models\hakAkses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    use HasFactory;

    protected $table = 'hak_akses';

    protected $primaryKey = 'id_akses';

    public $timestamps = false;

    protected $fillable = ['nama_akses','keterangan'];
}
