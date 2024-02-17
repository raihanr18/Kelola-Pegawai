<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manajer extends Model
{
    use HasFactory;

    protected $table = 'manajers';

    protected $fillable = ['pegawai_id', 'tanggal_penunjukan'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
