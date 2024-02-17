<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaans';

    protected $fillable = ['pegawai_id', 'departemen_id', 'jabatan_id', 'tanggal_mulai', 'tanggal_selesai'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departmen::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
