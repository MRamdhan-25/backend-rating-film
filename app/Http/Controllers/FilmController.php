<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    // GET: Ambil semua data film
    public function index()
    {
        return response()->json(Film::all(), 200);
    }

    // POST: Tambah film baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $film = Film::create($request->all());

        return response()->json([
            'message' => 'Film berhasil ditambahkan',
            'data' => $film,
        ], 201);
    }

    // GET: Tampilkan detail film berdasarkan ID
    public function show(Film $film)
    {
        return response()->json($film, 200);
    }

    // PUT: Update film
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $film->update($request->all());

        return response()->json([
            'message' => 'Film berhasil diperbarui',
            'data' => $film,
        ], 200);
    }

    // DELETE: Hapus film
    public function destroy(Film $film)
    {
        $film->delete();

        return response()->json([
            'message' => 'Film berhasil dihapus',
        ], 200);
    }
}
