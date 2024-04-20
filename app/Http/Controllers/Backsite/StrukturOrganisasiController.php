<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Struktur_Organisasi;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index(): View
    {
        // Ambil data struktur organisasi dari database
        $posts = Struktur_Organisasi::latest()->paginate(5);

        // Tampilkan data dalam view
        return view('pages.backsite.struktur.index', compact('posts'));
    }

    public function create(): View
    {
        return view('pages.backsite.struktur.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'nama_organisasi' => 'required',
            'jabatan'         => 'required',
            'nama_pengurus'   => 'required',
            'foto_pengurus'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        // Simpan foto
        $newImage = '';
        if ($request->hasFile('foto_pengurus')) {
            $image = $request->file('foto_pengurus');
            $imageName = $request->nama_organisasi . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/foto_pengurus', $imageName);
            $newImage = $imageName;
        }

        // Buat data baru dalam database
        Struktur_Organisasi::create([
            'nama_organisasi' => $request->nama_organisasi,
            'jabatan'         => $request->jabatan,
            'nama_pengurus'   => $request->nama_pengurus,
            'foto_pengurus'   => $newImage
        ]);

        // Redirect ke halaman index
        return redirect()->route('struktur.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function show(string $id): View
    {
        //get data by ID
        $struktur_organisasi = Struktur_Organisasi::findOrFail($id);

        //render view with data
        return view('pages.backsite.struktur.show', compact('struktur_organisasi'));
    }

    public function edit(string $id): View
    {
        //get data by ID
        $struktur_organisasi = Struktur_Organisasi::findOrFail($id);
    
        //render view with data
        return view('pages.backsite.struktur.edit', compact('struktur_organisasi'));
    }
    
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_organisasi' => 'required',
            'jabatan'         => 'required',
            'nama_pengurus'   => 'required',
            'foto_pengurus'   => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        //get data by ID
        $struktur_organisasi  = Struktur_Organisasi::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('foto_pengurus')) {

            //upload new image
            $image = $request->file('foto_pengurus');
            $imageName = $request->nama_organisasi . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/foto_pengurus', $imageName);

            //delete old image
            Storage::delete('public/foto_pengurus/'.$struktur_organisasi ->foto_pengurus);

            //update data with new image
            $struktur_organisasi ->update([
                'nama_organisasi' => $request->nama_organisasi,
                'jabatan'         => $request->jabatan,
                'nama_pengurus'   => $request->nama_pengurus,
                'foto_pengurus'   => $imageName
            ]);

        } else {

            //update data without image
            $struktur_organisasi ->update([
                'nama_organisasi' => $request->nama_organisasi,
                'jabatan'         => $request->jabatan,
                'nama_pengurus'   => $request->nama_pengurus,
            ]);
        }

        //redirect to index
        return redirect()->route('struktur.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get data by ID
        $struktur_organisasi = Struktur_Organisasi::findOrFail($id);
    
        //delete data
        Storage::delete('public/foto_pengurus/'.$struktur_organisasi->foto_pengurus);
        $struktur_organisasi->delete();
    
        //redirect to index
        return redirect()->route('struktur.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}