<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class api extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['nama', 'sekolah', 'program', 'angkatan', 'skor'];
}