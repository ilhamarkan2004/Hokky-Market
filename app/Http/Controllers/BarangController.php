<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class BarangController extends Controller
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
       $barangs = Barang::with('kategori')->get();
        return view('admin.barang.index',[
            'barangs'=>$barangs
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
        $kategoris = Kategori::with('barang')->get();
         return view('admin.barang.create',[
            'kategoris'=> $kategoris
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
         $validateData = $request->validate([
            'nama' => 'required|string',
            'kategori_id' => 'required|integer',
            'stok' => 'required|integer',
            'fotobarang' => 'required|image|mimes:png,jpg,jpeg.svg',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);
        $barang = new Barang();
        $barang->nama = $validateData['nama'];
        $barang->kategori_id = $validateData['kategori_id'];
        $barang->stok = $validateData['stok'];
        $barang->harga = $validateData['harga'];
        $barang->deskripsi = $validateData['deskripsi'];
        $barang->fotobarang = $validateData['fotobarang'];

          if ($request->File('fotobarang')) {
            $barang->fotobarang = $request->file('fotobarang')->store('fotobarang');
        }
        $barang->save();
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
         $kategoris = Kategori::with('barang')->get();
        return view('admin.barang.edit',[
            'barang'=>$barang,
            'kategoris' =>$kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $validateData = $request->validate([
            'nama' => 'required|string',
            'kategori_id' => 'required|integer',
            'stok' => 'required|integer',
            'fotobarang' => 'required|image|mimes:png,jpg,jpeg.svg',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);
        
        if ($request->File('fotobarang')) {
            $barang->fotobarang = $request->file('fotobarang')->store('fotobarang');
        }
                $barang->update($validateData);
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
         $barang->delete();

        return redirect()->route('barang.index');
    }
}