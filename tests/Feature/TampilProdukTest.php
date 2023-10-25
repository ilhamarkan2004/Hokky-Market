<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Mockery;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\Barang;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Response;

class TampilProdukTest extends TestCase
{
     use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */


  public function test_index()
{
 $produk = [
        'nama' => 'barang',
        'kategori_id' => 1,
        'fotobarang' => '',
        'deskripsi' => 'barang bagus',
        'stok' => 10,
        'harga' => 50000
    ];

    Barang::create($produk);

    $response = $this->get('/produk');
    $response->assertStatus(200);
    $response->assertViewIs('produk');

    // Memastikan bahwa data produk tersimpan dalam database
    $this->assertDatabaseHas('barangs', $produk);
}
}

