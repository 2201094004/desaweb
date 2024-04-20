<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Berita_Desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class BeritaDesaController extends Controller
{
    public function index(): View
    {
        // Mengambil post terbaru dengan pagination
        $posts = Berita_Desa::latest()->paginate(5);

        // Mengembalikan view dengan data post
        return view('pages.backsite.berita.index', compact('posts'));
    }

    public function create(): View
    {
        // Menampilkan view untuk membuat post baru
        return view('pages.backsite.berita.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $validatedData = $request->validate([
            'judul'       => 'required',
            'tanggal'     => 'required',
            'konten'      => 'required',
        ]);

        // Membuat post baru
        Berita_Desa::create($validatedData);

        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        // Mendapatkan post berdasarkan ID
        $post = Berita_Desa::findOrFail($id);

        // Mengembalikan view dengan data post
        return view('pages.backsite.berita.show', compact('post'));
    }

    public function edit(string $id): View
    {
        // Mendapatkan post berdasarkan ID
        $post = Berita_Desa::findOrFail($id);

        // Mengembalikan view untuk mengedit post
        return view('pages.backsite.berita.edit', compact('post'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $validatedData = $request->validate([
            'judul'       => 'required',
            'tanggal'     => 'required',
            'konten'      => 'required',
        ]);

        // Mendapatkan post berdasarkan ID
        $post = Berita_Desa::findOrFail($id);

        // Update post
        $post->update($validatedData);

        // Redirect ke halaman index
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        // Mendapatkan data berita desa berdasarkan ID
        $berita_desa = Berita_Desa::findOrFail($id);
    
        // Menghapus data berita desa
        $berita_desa->delete();
    
        // Redirect ke halaman index
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}