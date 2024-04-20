<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Data_Penduduk;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DataPendudukController extends Controller
{
    public function index(): View
    {
        // Ambil data penduduk dari database
        $posts = Data_Penduduk::all();

        // Tampilkan data dalam view
        return view('pages.backsite.datapenduduk.index', compact('posts'));
    }

    public function create(): View
    {
        // Tampilkan view untuk membuat data baru
        return view('pages.backsite.datapenduduk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $this->validate($request, [
            'nama'              => 'required',
            'jenis_kelamin'     => 'required',
            'tanggal_lahir'     => 'required',
            'alamat'            => 'required',
            'pekerjaan'         => 'required'
        ]);

        // Buat data baru dalam database
        Data_Penduduk::create([
            'nama'              => $request->nama,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'alamat'            => $request->alamat,
            'pekerjaan'         => $request->pekerjaan
        ]);

        // Redirect ke halaman index
        return redirect()->route('datapenduduk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id): View
    {
        // Dapatkan data penduduk berdasarkan ID
        $post = Data_Penduduk::findOrFail($id);

        // Tampilkan view untuk mengedit data penduduk
        return view('pages.backsite.datapenduduk.edit', compact('post'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $this->validate($request, [
            'nama'              => 'required',
            'jenis_kelamin'     => 'required',
            'tanggal_lahir'     => 'required',
            'alamat'            => 'required',
            'pekerjaan'         => 'required'
        ]);

        // Dapatkan data penduduk berdasarkan ID
        $post = Data_Penduduk::findOrFail($id);

        // Update data penduduk
        $post->update([
            'nama'              => $request->nama,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'alamat'            => $request->alamat,
            'pekerjaan'         => $request->pekerjaan
        ]);

        // Redirect ke halaman index
        return redirect()->route('datapenduduk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        // Dapatkan data penduduk berdasarkan ID
        $post = Data_Penduduk::findOrFail($id);

        // Hapus data penduduk
        $post->delete();

        // Redirect ke halaman index
        return redirect()->route('datapenduduk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}