<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;


class ApiController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return response()->json($siswas);
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return response()->json($siswa);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'sekolah' => 'required',
            'program' => 'required',
            'angkatan' => 'required',
            'skor' => 'required',
        ]);

        $siswa = new Siswa($validatedData);
        $siswa->save();

        return response()->json([
            'message' => 'Siswa berhasil ditambahkan',
            'data' => $siswa,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->nama = $request->input('nama');
        $siswa->sekolah = $request->input('sekolah');
        $siswa->program = $request->input('program');
        $siswa->angkatan = $request->input('angkatan');
        $siswa->skor = $request->input('skor');

        $siswa->save();
        return response()->json([
            'message' => 'Data siswa berhasil diperbarui',
            'data' => $siswa,
        ]);
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return response()->json([
            'message' => 'Data siswa berhasil dihapus',
        ]);
    }
}
