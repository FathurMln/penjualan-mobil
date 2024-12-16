<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('merek');
            $table->string('model');
            $table->string('tahun_pembelian');
            $table->string('harga');            
            $table->string('ketersediaan')->nullable();
            $table->string('kelengkapan');
            $table->string('foto');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mobils');
    }
};
