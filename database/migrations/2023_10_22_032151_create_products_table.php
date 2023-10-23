<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Kolom ID sebagai primary key
            $table->foreignId('category_id')->index()->constrained();
            $table->string('name'); // Kolom Nama Produk
            $table->text('description')->nullable(); // Kolom Deskripsi Produk (boleh kosong)
            $table->decimal('price', 10, 2); // Kolom Harga dengan dua angka desimal
            $table->timestamps(); // Kolom Waktu Pembuatan dan Pembaruan
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
