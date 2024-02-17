<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departmen extends Model
{
    use HasFactory;

    protected $table = 'departmens';

    protected $fillable = ['nama_departemen'];

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }
}
