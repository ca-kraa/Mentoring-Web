<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['nama', 'sekolah', 'program', 'angkatan', 'photo'];


    public function skor()
    {
        return $this->hasOne(Skor::class, 'program', 'program', 'task1', 'task2', 'task3', 'task4', 'task5', 'task6', 'task7', 'task8',);
    }
}
