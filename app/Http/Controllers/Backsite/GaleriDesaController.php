<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Galeri_Desa;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriDesaController extends Controller
{
    public function index(): View
    {
        //get posts
        $posts = Galeri_Desa::latest()->paginate(5);

        //render view with posts
        return view('pages.backsite.galeri.index', compact('posts'));
    }

    public function create(): View
    {
        return view('pages.backsite.galeri.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'judul'     => 'required',
            'deskripsi' => 'required',
            'foto'      => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        // Simpan foto
        $newImage = '';
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $request->judul . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/foto', $imageName);
            $newImage = $imageName;
        }

        // Buat data baru dalam database
        Galeri_Desa::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto'      => $newImage
        ]);

        // Redirect ke halaman index
        return redirect()->route('galeri.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function show(string $id): View
    {
        //get data by ID
        $galeri_desa = Galeri_Desa::findOrFail($id);

        //render view with data
        return view('pages.backsite.galeri.show', compact('galeri_desa'));
    }

    public function edit(string $id): View
    {
        //get data by ID
        $galeri_desa = Galeri_Desa::findOrFail($id);

        //render view with data
        return view('pages.backsite.galeri.edit', compact('galeri_desa'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'judul'     => 'required',
            'deskripsi' => 'required',
            'foto'      => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        //get data by ID
        $galeri_desa = Galeri_Desa::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('foto')) {
            //upload new image
            $image = $request->file('foto');
            $imageName = $request->judul . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/foto', $imageName);

            //delete old image
            Storage::delete('public/foto/' . $galeri_desa->foto);

            //update data with new image
            $galeri_desa->update([
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'foto'      => $imageName
            ]);
        } else {
            //update data without image
            $galeri_desa->update([
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('galeri.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get data by ID
        $galeri_desa = Galeri_Desa::findOrFail($id);

        //delete data
        Storage::delete('public/foto/' . $galeri_desa->foto);
        $galeri_desa->delete();

        //redirect to index
        return redirect()->route('galeri.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}