<?php

namespace App\Http\Controllers\Backsite;
use App\Models\Sejarah_Desa;
use Illuminate\View\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SejarahDesaController extends Controller
{
    public function index(): View
    {
        //get posts
        $posts =Sejarah_Desa::latest()->paginate(5);

        //render view with posts
        return view('pages.backsite.sejarah.index', compact('posts'));
    }
    public function create(): View
    {
        return view('pages.backsite.sejarah.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'tahun'            => 'required',
            'deskripsi'        => 'required'
        ]);

         //create post
         Sejarah_Desa::create([
            'tahun'              => $request->tahun,
            'deskripsi'          => $request->deskripsi,

        ]);

        //redirect to index
        return redirect()->route('sejarah.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
