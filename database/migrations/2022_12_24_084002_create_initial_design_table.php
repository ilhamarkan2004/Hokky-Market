<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('kategori_id')->constrained('kategoris');
            $table->string('fotobarang');
            $table->text('deskripsi');
            $table->bigInteger('stok');
            $table->bigInteger('harga');
            $table->timestamps();
        });
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('barang_id')->constrained('barangs');
            $table->Integer('rating');
            $table->Text('deskripsi');
            $table->timestamps();
        });
         Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('barang_id')->constrained('barangs');
            $table->timestamps();
        });

         Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keranjang_id')->constrained('keranjangs');
            $table->foreignId('barang_id')->constrained('barangs');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
        Schema::dropIfExists('kategoris');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('keranjangs');
        Schema::dropIfExists('pemesanans');

    }
};
