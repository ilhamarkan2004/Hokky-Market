<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function keranjangs()
    {
        return $this->belongsToMany(Keranjang::class, 'detail_keranjang')->withPivot('jumlah', 'total_harga');
}
    public function review(){
        return $this->hasMany(Review::class);
    }
}
