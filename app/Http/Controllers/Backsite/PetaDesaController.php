<?php

namespace App\Http\Controllers\Backsite;
use App\Models\Peta_Desa;
use Illuminate\View\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PetaDesaController extends Controller
{
    public function index(): View
    {
        //get posts
        $posts =Peta_Desa::latest()->paginate(5);

        //render view with posts
        return view('pages.backsite.peta.index', compact('posts'));
    }
    public function create(): View
    {
        return view('pages.backsite.peta.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama'            => 'required',
            'latitude'        => 'required',
            'longitude'       => 'required',
        ]);

        //upload image
        $image = $request->file('nama');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Peta_Desa::create([
            'nama'              => $request->nama,
            'latitude'          => $request->latitude,
            'longitude'         => $request->longitude

        ]);

        //redirect to index
        return redirect()->route('peta.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
