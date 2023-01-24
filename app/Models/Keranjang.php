<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $guarded= [
        'id'
    ];


     public function barang()
    {
        return $this->belongsToMany(Barang::class, 'detail_keranjang')->withPivot('jumlah', 'total_harga');
    }
    // public function hitungTotal()
    // {
    //     $total = 0;
    //     $barangs = $this->barangs;
    //     foreach ($barangs as $barang) {
    //         $total += $barang->harga * $barang->pivot->jumlah;
    //     }
    //     return $total;
    // }
    public function pemesanan(){
        return $this->hasOne(Pemesanan::class);
    }
}
