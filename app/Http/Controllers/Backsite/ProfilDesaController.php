<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Profil_Desa;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    public function index(): View
    {
        // Ambil data profil desa terbaru dengan sistem paginasi
        $posts = Profil_Desa::latest()->paginate(5);

        // Render view dengan data profil desa
        return view('pages.backsite.profil.index', compact('posts'));
    }

    public function create(): View
    {
        return view('pages.backsite.profil.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $validatedData = $request->validate([
            'nama_desa' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
        ]);

        // Buat entri profil desa baru
        Profil_Desa::create($validatedData);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('profil.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function show(string $id): View
    {
        // Dapatkan profil desa berdasarkan ID
        $post = Profil_Desa::findOrFail($id);

        // Render view dengan data profil desa
        return view('pages.backsite.profil.show', compact('post'));
    }

    public function edit(string $id): View
    {
        // Dapatkan profil desa berdasarkan ID
        $post = Profil_Desa::findOrFail($id);

        // Render view untuk mengedit profil desa
        return view('pages.backsite.profil.edit', compact('post'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $validatedData = $request->validate([
            'nama_desa' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
        ]);

        // Dapatkan profil desa berdasarkan ID
        $post = Profil_Desa::findOrFail($id);

        // Update profil desa
        $post->update($validatedData);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('profil.index')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id): RedirectResponse
    {
        // Dapatkan profil desa berdasarkan ID
        $post = Profil_Desa::findOrFail($id);
    
        // Hapus profil desa
        $post->delete();
    
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('profil.index')->with('success', 'Data Berhasil Dihapus!');
    }
}