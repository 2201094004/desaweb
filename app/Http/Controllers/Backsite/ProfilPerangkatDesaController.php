<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Profil_Perangkat_Desa;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilPerangkatDesaController extends Controller
{
    public function index(): View
    {
        //get posts
        $posts =Profil_Perangkat_Desa::latest()->paginate(5);

        //render view with posts
        return view('pages.backsite.perangkatdesa.index', compact('posts'));
    }
    public function create(): View
    {
        return view('pages.backsite.perangkatdesa.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama'            => 'required|min:5',
            'jabatan'         => 'required|min:5',
            'foto_perangkat'  => 'required|min:10',
            'deskripsi'       => 'required|min:10',
        ]);

        //upload image
        $image = $request->file('nama');
        $image->storeAs('public/posts', $image->hashName());

         //create post
         Profil_Perangkat_Desa::create([
            'nama'              => $request->nama,
            'jabatan'           => $request->jabatan,
            'foto_perangkat'    => $request->foto_perangkat,
            'deskripsi'         => $request->deskripsi

        ]);

        //redirect to index
        return redirect()->route('perangkatdesa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
