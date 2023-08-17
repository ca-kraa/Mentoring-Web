<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    use HasFactory;
    protected $table = 'skors';
    protected $fillable = [
        'nama', 'sekolah', 'program', 'angkatan', 'task1', 'task2', 'task3', 'task4', 'task5', 'task6', 'task7', 'task8',
    ];

    public function siswa()
    {
        return $this->hasOne(Skor::class);
    }
}
