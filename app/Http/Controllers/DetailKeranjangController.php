<?php

namespace App\Http\Controllers;

use App\Models\DetailKeranjang;
use App\Http\Requests\StoreDetailKeranjangRequest;
use App\Http\Requests\UpdateDetailKeranjangRequest;

class DetailKeranjangController extends Controller
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
     * @param  \App\Http\Requests\StoreDetailKeranjangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailKeranjangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailKeranjang  $detailKeranjang
     * @return \Illuminate\Http\Response
     */
    public function show(DetailKeranjang $detailKeranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailKeranjang  $detailKeranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailKeranjang $detailKeranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailKeranjangRequest  $request
     * @param  \App\Models\DetailKeranjang  $detailKeranjang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailKeranjangRequest $request, DetailKeranjang $detailKeranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailKeranjang  $detailKeranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailKeranjang $detailKeranjang)
    {
        //
    }
}
