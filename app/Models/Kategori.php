<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable= [
        'nama'
    ];
    protected $attributes = [
    'kategori_id' => 1, // Ganti dengan nilai default yang sesuai
];
    public function barang(){
        return $this->hasMany(Barang::class);
    }
}
