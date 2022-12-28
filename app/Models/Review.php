<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'rating','deskripsi'
    ];
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
