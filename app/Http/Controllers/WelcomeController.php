<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Skor;

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

        // Use eager loading to retrieve skor for each siswa
        $siswas = $query->with('skor')->get();

        // Sort siswas based on total score
        $sortedSiswas = $siswas->sortByDesc(function ($siswa) {
            if ($siswa->skor) {
                return ($siswa->skor->task1 + $siswa->skor->task2 + $siswa->skor->task3 + $siswa->skor->task4 + $siswa->skor->task5 + $siswa->skor->task6 + $siswa->skor->task7 + $siswa->skor->task8) / 8;
            } else {
                return 0;
            }
        });

        return view('welcome', compact('sortedSiswas'));
    }
}
