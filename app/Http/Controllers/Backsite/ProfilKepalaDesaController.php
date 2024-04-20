<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Profil_Kepala_Desa;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilKepalaDesaController extends Controller
{
    public function index(): View
    {
        // Ambil data kepaladesa organisasi dari database
        $posts = Profil_Kepala_Desa::latest()->paginate(5);

        // Tampilkan data dalam view
        return view('pages.backsite.kepaladesa.index', compact('posts'));
    }

    public function create(): View
    {
        return view('pages.backsite.kepaladesa.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'nama_kepala_desa' => 'required',
            'foto_kepala_desa'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
            'deskripsi'   => 'required',
        ]);

        // Simpan foto
        $newImage = '';
        if ($request->hasFile('foto_kepala_desa')) {
            $image = $request->file('foto_kepala_desa');
            $imageName = $request->nama_kepala_desa . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/foto_kepala_desa', $imageName);
            $newImage = $imageName;
        }

        // Buat data baru dalam database
        Profil_Kepala_Desa::create([
            'nama_kepala_desa' => $request->nama_kepala_desa,
            'deskripsi'   => $request->deskripsi,
            'foto_kepala_desa'   => $newImage
        ]);

        // Redirect ke halaman index
        return redirect()->route('kepaladesa.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function show(string $id): View
    {
        //get data by ID
        $profil_Kepala_Desa = Profil_Kepala_Desa::findOrFail($id);

        //render view with data
        return view('pages.backsite.kepaladesa.show', compact('profil_kepala_desa'));
    }

    public function edit($id): View
{
    // Mengambil data kepala desa berdasarkan ID
    $profil_kepala_desa = Profil_Kepala_Desa::findOrFail($id);
    
    // Render view dengan data
    return view('pages.backsite.kepaladesa.edit', compact('profil_kepala_desa'));
}

public function update(Request $request, $id): RedirectResponse
{
    // Validasi form
    $this->validate($request, [
        'nama_kepala_desa' => 'required',
        'deskripsi'   => 'required',
        'foto_kepala_desa'   => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
    ]);

    // Mengambil data kepala desa berdasarkan ID
    $profil_kepala_desa  = Profil_Kepala_Desa::findOrFail($id);

    // Check if image is uploaded
    if ($request->hasFile('foto_kepala_desa')) {
        // Upload new image
        $image = $request->file('foto_kepala_desa');
        $imageName = $request->nama_kepala_desa . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/foto_kepala_desa', $imageName);

        // Delete old image
        Storage::delete('public/foto_kepala_desa/'.$profil_kepala_desa->foto_kepala_desa);

        // Update data with new image
        $profil_kepala_desa->update([
            'nama_kepala_desa' => $request->nama_kepala_desa,
            'deskripsi'   => $request->deskripsi,
            'foto_kepala_desa'   => $imageName
        ]);
    } else {
        // Update data without image
        $profil_kepala_desa->update([
            'nama_kepala_desa' => $request->nama_kepala_desa,
            'deskripsi'   => $request->deskripsi,
        ]);
    }

    // Redirect to index
    return redirect()->route('kepaladesa.index')->with(['success' => 'Data Berhasil Diubah!']);
}

public function destroy($id): RedirectResponse
{
    // Get data by ID
    $profil_kepala_desa = Profil_Kepala_Desa::findOrFail($id);
    
    // Delete data
    Storage::delete('public/foto_kepala_desa/'.$profil_kepala_desa->foto_kepala_desa);
    $profil_kepala_desa->delete();
    
    // Redirect to index
    return redirect()->route('kepaladesa.index')->with(['success' => 'Data Berhasil Dihapus!']);
}
}