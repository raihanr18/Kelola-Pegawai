<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $fillable = [
        'nama', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 'gaji',
    ];

    public function manajer()
    {
        return $this->hasOne(Manajer::class);
    }

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }
}
