<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'tb_peserta';
    protected $fillable = [
        'nama', 'jk', 'pendidikan', 'nip', 'golongan', 'pangkat', 'jabatan', 'ttl', 'npwp', 'unit_kerja', 'alamat_unit_kerja', 'kabkota', 'propinsi', 'tlp_kantor', 'no_hp', 'email'
    ];
}
