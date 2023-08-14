<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $programFilter = $request->input('program', ''); // Ambil nilai program dari input

        $validPrograms = ['Flutter', 'Kotlin', 'UI Design', 'Web Developer'];

        $query = Siswa::query();

        if ($programFilter && in_array($programFilter, $validPrograms)) {
            $query->where('program', $programFilter);
        }

        $siswas = $query->orderByDesc('skor')->get();

        return view('welcome', compact('siswas', 'programFilter'));
    }
}
