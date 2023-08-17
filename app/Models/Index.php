<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;

    protected $table;

    protected $fillable;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = $this->getTableByContext();
        $this->fillable = $this->getFillableByContext();
    }

    private function getTableByContext()
    {
        return $this->getTable() === 'siswas' ? 'siswas' : 'skors';
    }

    private function getFillableByContext()
    {
        return $this->getTable() === 'siswas'
            ? ['nama', 'sekolah', 'program', 'angkatan', 'skor']
            : ['nama', 'sekolah', 'program', 'angkatan', 'task1', 'task2', 'task3', 'task4', 'task5', 'task6', 'task7', 'task8'];
    }
}
