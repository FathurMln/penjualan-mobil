<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_hp');
            $table->string('email');                                
            $table->string('harga');                     
            $table->foreignId('mobil_id')->constrained('mobils')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
