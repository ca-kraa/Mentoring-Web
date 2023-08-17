<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $programFilter = $request->input('program');

        $validPrograms = ['Flutter', 'Kotlin', 'UI Design', 'Web Developer'];

        $query = Siswa::query();

        if ($programFilter && in_array($programFilter, $validPrograms)) {
            $query->where('program', $programFilter);
        }

        $siswas = $query->with(['skors' => function ($query) {
            $query->orderByDesc('task1')
                ->orderByDesc('task2')
                ->orderByDesc('task3')
                ->orderByDesc('task4')
                ->orderByDesc('task5')
                ->orderByDesc('task6')
                ->orderByDesc('task7')
                ->orderByDesc('task8');
        }])->get();

        // Mengurutkan siswa berdasarkan skor tertinggi
        $sortedSiswas = $siswas->sortByDesc(function ($siswa) {
            if ($siswa->skors) {
                return ($siswa->skors->task1 + $siswa->skors->task2 + $siswa->skors->task3 + $siswa->skors->task4 +
                    $siswa->skors->task5 + $siswa->skors->task6 + $siswa->skors->task7 + $siswa->skors->task8) / 8;
            } else {
                return 0;
            }
        });

        return view('welcome', compact('sortedSiswas'));
    }
}
