<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Skor;


class IndexController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        $totalSiswas = Siswa::count();
        $totalSkor = Skor::sum('task1') + Skor::sum('task2') + Skor::sum('task3') + Skor::sum('task4') + Skor::sum('task5') + Skor::sum('task6') + Skor::sum('task7') + Skor::sum('task8');

        $programCounts = [
            'Flutter' => Siswa::where('program', 'flutter')->count(),
            'Kotlin' => Siswa::where('program', 'kotlin')->count(),
            'UI Design' => Siswa::where('program', 'UI Design')->count(),
            'Web Developer' => Siswa::where('program', 'Web Developer')->count(),
        ];

        return view('index', compact('siswas', 'totalSiswas', 'programCounts', 'totalSkor'));
    }
}
