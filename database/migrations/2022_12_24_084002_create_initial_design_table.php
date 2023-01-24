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
        //     Schema::create('barangs', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama');
        //     $table->foreignId('kategori_id')->constrained('kategoris');
        //     $table->string('fotobarang');
        //     $table->text('deskripsi');
        //     $table->bigInteger('stok');
        //     $table->bigInteger('harga');
        //     $table->timestamps();
        // });
        //  Schema::create('keranjangs', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->constrained('users');
        //     $table->timestamps();
        // });
        //  Schema::create('detail_keranjangs', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('keranjang_id')->constrained('keranjangs');
        //     $table->foreignId('barang_id')->constrained('barangs');
        //     $table->bigInteger('jumlah');
        //     $table->bigInteger('total_harga');
        //     $table->timestamps();
        // });
           Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('kategori_id');
            $table->string('fotobarang');
            $table->string('deskripsi');
            $table->integer('stok');
            $table->double('harga');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->timestamps();
        });
         Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('total_harga')->default(0);
            $table->timestamps();
        });
         Schema::create('detail_keranjangs', function (Blueprint $table) {
            $table->unsignedBigInteger('keranjang_id');
            $table->unsignedBigInteger('barang_id');
            $table->integer('jumlah');
            $table->double('total_harga')->default(0);
            $table->foreign('keranjang_id')->references('id')->on('keranjangs')->onDelete('cascade');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->primary(['keranjang_id', 'barang_id']);
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
         Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            // // $table->foreignId('keranjang_id')->constrained('keranjangs');
            $table->string('alamat');
            $table->string('total_harga');
            $table->string('no_hp');
            $table->unsignedBigInteger('keranjang_id');
            $table->foreign('keranjang_id')->references('id')->on('keranjangs')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('detail_keranjangs');

    }
};
