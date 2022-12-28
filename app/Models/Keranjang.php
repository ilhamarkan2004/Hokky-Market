<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    // protected $fillable= [
    //     'nama'
    // ];
    public function barang(){
        return $this->hasMany(Barang::class);
    }
    public function pemesanan(){
        return $this->hasOne(Pemesanan::class);
    }
}
