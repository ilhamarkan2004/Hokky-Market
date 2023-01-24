<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $admin = User::factory()->create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'role' => 'admin',
            'photoprofile' => '',
        ]);
           $admin = User::factory()->create([
            'email' => 'ilhamarkan2004@gmail.com',
            'name' => 'Mohammad Ilham Arkan',
            'role' => 'customer',
            'photoprofile' => '',
        ]);
           $admin = User::factory()->create([
            'email' => 'ilhamarkan2004@student.ub.ac.id',
            'name' => 'Akun UB',
            'role' => 'customer',
            'photoprofile' => '',
        ]);
           $admin = Kategori::factory()->create([
            'nama' => 'Sembako'
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 1',
            'kategori_id' => '1',
            'deskripsi' => 'hahahahahah',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 2',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 3',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 4',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 5',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 6',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 7',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 8',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 9',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 10',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 11',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 12',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 13',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 14',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 15',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 16',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 17',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 18',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 19',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 20',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 21',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 22',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 23',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 24',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 25',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 26',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 27',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 28',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 29',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 30',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 31',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 32',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 33',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 34',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 35',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 36',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);
           $admin = Barang::factory()->create([
            'nama' => 'Barang 37',
            'kategori_id' => '1',
            'deskripsi' => 'hihihihihu',
            'fotobarang' => '',
            'stok' => 20,
            'harga' => 5000,
        ]);

    }
}
