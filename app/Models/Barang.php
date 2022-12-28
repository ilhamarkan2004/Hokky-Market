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
    public function keranjang(){
    return $this->belongsTo(Keranjang::class);
    }
    public function review(){
        return $this->hasMany(Review::class);
    }
}
