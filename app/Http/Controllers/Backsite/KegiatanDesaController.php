<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Kegiatan_Desa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class KegiatanDesaController extends Controller
{
    public function index(): View
    {
        // Mengambil data kegiatan desa terbaru dengan sistem paginasi
        $posts = Kegiatan_Desa::latest()->paginate(5);

        // Mengirim data ke view
        return view('pages.backsite.kegiatan.index', compact('posts'));
    }

    public function create(): View
    {
        // Menampilkan halaman untuk membuat kegiatan desa baru
        return view('pages.backsite.kegiatan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi input form
        $this->validate($request, [
            'nama_kegiatan'       => 'required',
            'tanggal'             => 'required',
            'deskripsi'           => 'required',
        ]);

        // Membuat entri kegiatan desa baru
        Kegiatan_Desa::create([
            'nama_kegiatan'      => $request->nama_kegiatan,
            'tanggal'            => $request->tanggal,
            'deskripsi'          => $request->deskripsi,
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id): View
    {
        // Mengambil data kegiatan desa berdasarkan ID
        $kegiatan = Kegiatan_Desa::findOrFail($id);

        // Menampilkan halaman edit dengan data kegiatan yang dipilih
        return view('pages.backsite.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi input form
        $this->validate($request, [
            'nama_kegiatan'       => 'required',
            'tanggal'             => 'required',
            'deskripsi'           => 'required',
        ]);

        // Mengambil data kegiatan desa berdasarkan ID
        $kegiatan = Kegiatan_Desa::findOrFail($id);

        // Update data kegiatan desa
        $kegiatan->update([
            'nama_kegiatan'      => $request->nama_kegiatan,
            'tanggal'            => $request->tanggal,
            'deskripsi'          => $request->deskripsi,
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        // Dapatkan data penduduk berdasarkan ID
        $kegiatan = Kegiatan_Desa::findOrFail($id);

        // Hapus data penduduk
        $kegiatan->delete();

        // Redirect ke halaman index
        return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}