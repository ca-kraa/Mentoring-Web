<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $fillable = ['nama', 'sekolah', 'program', 'angkatan', 'photo', 'portofolio'];

    public function skors()
    {
        return $this->hasOne(Skor::class, 'nama', 'nama');
    }
}
