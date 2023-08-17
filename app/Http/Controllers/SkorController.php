<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skor;
use App\Models\Siswa;

class SkorController extends Controller
{
    public function index()
    {
        $skors = Skor::orderBy('nama', 'asc')->get();
        $siswas = Siswa::all();
        return view('skor.index', compact('skors', 'siswas'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        return view('skor.create', compact('siswas'));
    }

    public function tambah()
    {
        $siswas = Siswa::all();
        return view('skor.tambah', compact('siswas'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'sekolah' => 'required',
            'program' => 'required',
            'angkatan' => 'required',
            'task1' => 'required',
            'task2' => 'required',
            'task3' => 'required',
            'task4' => 'required',
            'task5' => 'required',
            'task6' => 'required',
            'task7' => 'required',
            'task8' => 'required',
        ]);

        Skor::create($validatedData);

        return redirect()->route('skor.index')->with('success', 'Data skor telah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $skor = Skor::findOrFail($id);
        $siswaList = Siswa::all();
        return view('skor.edit', ['skor' => $skor, 'siswaList' => $siswaList]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'nullable',
            'sekolah' => 'nullable',
            'program' => 'nullable',
            'angkatan' => 'nullable',
            'task1' => 'required',
            'task2' => 'required',
            'task3' => 'required',
            'task4' => 'required',
            'task5' => 'required',
            'task6' => 'required',
            'task7' => 'required',
            'task8' => 'required',
        ]);

        $skor = Skor::findOrFail($id);
        $skor->update($validatedData);

        return redirect()->route('skor.index')->with('success', 'Data skor telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $skor = Skor::findOrFail($id);
        $skor->delete();

        return redirect()->route('skor.index')->with('success', 'Data skor telah berhasil dihapus');
    }
    public function lihatNilai($id)
    {
        $skor = Skor::findOrFail($id);
        return view('skor.index', compact('skor'));
    }
}
