<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $table = 'tb_kehadiran';
    protected $fillable = [
        'id', 'nama', 'jk', 'pendidikan', 'nip', 'golongan', 'pangkat', 'jabatan', 'ttl', 'npwp', 'unit_kerja', 'alamat_unit_kerja', 'kabkota', 'propinsi', 'tlp_kantor', 'no_hp', 'email', 'status', 
    ];
}
