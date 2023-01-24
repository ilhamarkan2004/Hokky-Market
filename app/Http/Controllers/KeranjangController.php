<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Http\Requests\StoreKeranjangRequest;
use App\Models\Barang;
use App\Models\DetailKeranjang;
use App\Http\Requests\UpdateKeranjangRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Gate;


class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //      $user_id = Auth::user()->id;
    // $keranjang = Keranjang::where('user_id', $user_id)->first();
    // $detail_keranjang = DetailKeranjang::where('keranjang_id', $keranjang->id)->get();
    // $barangs = Barang::whereIn('id', $detail_keranjang->pluck('barang_id'))->get();
    // return view('keranjang', compact('barangs', 'detail_keranjang'));


$user_id = Auth::user()->id;
$barangs = DB::table('barangs')
->join('detail_keranjangs', 'barangs.id', '=', 'detail_keranjangs.barang_id')
->join('keranjangs', 'keranjangs.id', '=', 'detail_keranjangs.keranjang_id')
->where('keranjangs.user_id', $user_id)
->select('barangs.*', 'detail_keranjangs.jumlah', 'detail_keranjangs.total_harga')
->get();
$keranjang = Keranjang::where('user_id',$user_id)->first();
    // dd($barangs);
    // $barangs = $keranjang->barang;
    return view('keranjang', ['barangs' => $barangs,'keranjang'=>$keranjang]);

       
        // $user_id = Auth::user()->id;
        // $keranjang = Keranjang::where('user_id', $user_id)->first();
        // $detail_keranjang = DetailKeranjang::where('keranjang_id', $keranjang->id)->get();
        // dd($detail_keranjang);
        // return view('keranjang', compact('keranjang', 'detail_keranjang'));











        // $detail_keranjang = DB::table('barangs')
        //         ->join('detail_keranjangs', 'barang_id', '=', 'detail_keranjangs.barang_id')
        //         ->join('keranjangs', 'keranjang_id', '=', 'detail_keranjangs.keranjang_id')
        //         ->where('keranjangs.user_id', $user_id)
        //         ->get();
        //         dd($detail_keranjang);
        //         return view('keranjang',['detail_keranjang'=>$detail_keranjang]);

//         $user_id = Auth::user()->id;
// $keranjang = Keranjang::where('user_id', $user_id)->first();
// $detail_keranjang = DB::table('barangs')
//                 ->join('detail_keranjangs', 'barang_id', '=', 'detail_keranjangs.barang_id')
//                 ->join('keranjangs', 'keranjang_id', '=', 'detail_keranjangs.keranjang_id')
//                 ->where('keranjang_id', $keranjang->id)
//                 ->get();
//                          dd($detail_keranjang);
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
     * @param  \App\Http\Requests\StoreKeranjangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
     

        $barang = Barang::find($request->id);
        $user_id = Auth::user()->id;

        // Check if user already have cart
        $keranjang = Keranjang::where('user_id', $user_id)->first();
        

        // If user already have cart
        if ($keranjang) {
//             $total_harga = DB::table('detail_keranjangs')
//                 ->where('keranjang_id', $keranjang->id)
//                 ->sum('total_harga');
//             DB::table('keranjangs')
// ->where('id', $keranjang->id)
// ->update(['total_harga' => $total_harga]);


            // Check if item already in cart
            $detail_keranjang = DetailKeranjang::where('keranjang_id', $keranjang->id)->where('barang_id', $barang->id)->first();




            // If item already in cart, add new item to the existing cart
            if ($detail_keranjang) {
           $detail_keranjang = DetailKeranjang::where('keranjang_id', $keranjang->id)->where('barang_id', $barang->id)->update(['jumlah' => DB::raw('jumlah + 1'), 'total_harga' => DB::raw('total_harga + '.$barang->harga)]);








            } else {
                // create new item in cart
                $detail_keranjang = new DetailKeranjang();
                $detail_keranjang->keranjang_id = $keranjang->id;
                $detail_keranjang->barang_id = $barang->id;
                $detail_keranjang->jumlah = 1;
                $detail_keranjang->total_harga = $barang->harga * 1;
                $detail_keranjang->save();
            }
            // calculate new total_harga for cart
        $total_harga = DetailKeranjang::where('keranjang_id', $keranjang->id)->sum('total_harga');
        $keranjang->total_harga = $total_harga;
        $keranjang->update();
            } else {
               



            // create new cart
            $keranjang = new Keranjang();
            $keranjang->user_id = $user_id;
            $keranjang->total_harga=$barang->harga;

            
            $keranjang->save();

            

    // create new item in cart
        $detail_keranjang = new DetailKeranjang();
        $detail_keranjang->keranjang_id = $keranjang->id;
        $detail_keranjang->barang_id = $barang->id;
        $detail_keranjang->jumlah = 1;
        $detail_keranjang->total_harga = $barang->harga * 1;
        $detail_keranjang->save();
    }

    return redirect()->back()->with('success', $barang->nama.' ditambahkan ke dalam keranjang');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeranjangRequest  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeranjangRequest $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keranjang $keranjang)
    {
        $keranjang = Keranjang::find($keranjang->id);
        $keranjang->delete();

        return  redirect()->back();
    }
}
