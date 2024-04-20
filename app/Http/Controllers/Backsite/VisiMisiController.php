<?php

namespace App\Http\Controllers\Backsite;
use App\Models\Visi_Misi;
use Illuminate\View\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index(): View
    {
        //get posts
        $posts =Visi_Misi::latest()->paginate(5);

        //render view with posts
        return view('pages.backsite.visimisi.index', compact('posts'));
    }
    public function create(): View
    {
        return view('pages.backsite.visimisi.create');
    }

    public function store(Request $request):RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'judul'       => 'required',
            'deskripsi'   => 'required',
        ]);

         //create post
        Visi_Misi::create([
            'judul'        => $request->judul,
            'deskripsi'    => $request->deskripsi,
        ]);

        //redirect to index
        return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
