<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Skor;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        $skors = Skor::all();
        $reviews = Review::all();

        return view('home', compact('siswas', 'skors', 'reviews'));
    }
}
