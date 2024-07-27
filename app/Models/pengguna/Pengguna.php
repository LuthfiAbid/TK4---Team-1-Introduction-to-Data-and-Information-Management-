<?php

namespace App\Models\pengguna;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    public $fillable = ['nama_pengguna', 'password', 'nama_depan', 'nama_belakang', 'no_hp', 'alamat', 'id_akses'];
}
