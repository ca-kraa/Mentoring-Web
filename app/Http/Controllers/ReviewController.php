<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Siswa;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('nama', 'asc')->get();
        $siswas = Siswa::all();

        return view('review.index', compact('reviews', 'siswas'));
    }

    public function create()
    {
        $siswas = Siswa::whereNotIn('nama', Review::pluck('nama'))->get();

        return view('review.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'program' => 'required',
            'angkatan' => 'required',
            'review' => 'required',
            'photo' => 'required',
        ]);

        Review::create($validatedData);

        return redirect()->route('review.index')
            ->with('success', 'Review added successfully');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('review.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'nullable',
            'program' => 'nullable',
            'angkatan' => 'nullable',
            'review' => 'required',
            'photo' => 'nullable',
        ]);

        $review = Review::findOrFail($id);
        $review->update($validatedData);

        return redirect()->route('review.index')
            ->with('success', 'Review updated successfully');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('review.index')
            ->with('success', 'Review deleted successfully');
    }
}
