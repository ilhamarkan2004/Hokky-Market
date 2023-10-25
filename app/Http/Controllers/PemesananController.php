<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Keranjang;
use App\Models\Barang;
use App\Models\DetailKeranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemesananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Find the cart for the logged in user
        $keranjang = Keranjang::where('user_id', Auth::user()->id)->first();

        // Validate input data
        $validatedData = $request->validate([
            'alamat' => 'required',
            'biaya_pengiriman' => 'required',
            'no_hp' => 'required',
        ]);

        // Create a new order and save it to the database
        $pemesanan = new Pemesanan();
        $pemesanan->keranjang_id = $keranjang->id;
        $pemesanan->user_id = Auth::user()->id;
        $pemesanan->alamat = $request->alamat;
        $pemesanan->biaya_pengiriman = $request->biaya_pengiriman;
        $pemesanan->total_produk = $keranjang->total_harga;
        $pemesanan->biaya_total = $keranjang->total_harga + $request->biaya_pengiriman;
        $pemesanan->no_hp = $request->no_hp;
        $pemesanan->save();

        // Calculate total product and total cost
        $keranjang = Keranjang::find($keranjang->id);
        $detail_keranjangs = DetailKeranjang::where('keranjang_id', $keranjang->id)->get();
        $total_produk = 0;
        foreach($detail_keranjangs as $detail_keranjang) {
            $total_produk += $detail_keranjang->jumlah;
            $barang = Barang::find($detail_keranjang->barang_id);
            if ($barang->stok < $detail_keranjang->jumlah) {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi');
            } else {
                $barang->stok = $barang->stok - $detail_keranjang->jumlah;
                $barang->update();
            }
        }
        $pemesanan->total_produk = $total_produk;
        $pemesanan->biaya_total = $total_produk + $request->biaya_pengiriman;

        // Save pemesanan
        $pemesanan->save();
        // Delete items in the cart
        $detail_keranjangs = Keranjang::where('id', $keranjang->id)->delete();

        return redirect()->route('index')->with('success', 'Pemesanan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemesananRequest  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
