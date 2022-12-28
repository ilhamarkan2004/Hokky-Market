<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Gate;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $kategoris = Kategori::with('barang')->get();
        return view('admin.kategori.index',[
            'kategoris'=>$kategoris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
          return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
          $validateData = $request->validate([
            'nama' => 'required|string',
        
        ]);
        $kategori = new Kategori();
        $kategori->nama = $validateData['nama'];
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        return view('admin.kategori.edit',[
            'kategori'=>$kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriRequest  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $validateData = $request->validate([
            'nama' => 'required|string',
        
        ]);
        $kategori->update($validateData);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $kategori->delete();

        return redirect()->route('kategori.index');
    }
}
