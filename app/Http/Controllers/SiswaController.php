<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('nama', 'asc')->get();
        $totalSiswas = Siswa::count();

        return view('siswa.index', compact('siswas', 'totalSiswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }
    public function store(Request $request)
    {
        $siswa = new Siswa([
            'nama' => $request->nama,
            'sekolah' => $request->sekolah,
            'program' => $request->program,
            'angkatan' => $request->angkatan,
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $siswa->photo = $photoPath;
        }

        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }


    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        $siswa->nama = $request->nama;
        $siswa->sekolah = $request->sekolah;
        $siswa->program = $request->program;
        $siswa->angkatan = $request->angkatan;
        if ($request->hasFile('photo')) {
            if ($siswa->photo) {
                Storage::disk('public')->delete($siswa->photo);
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
            $siswa->photo = $photoPath;
        }

        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }


    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
