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
        Schema::create('layanan_internets', function (Blueprint $table) {
            $table->id();
            $table->string('benefit_id')->nullable();
            $table->string('nama_paket')->nullable();
            $table->string('kategori')->nullable();
            $table->string('harga')->nullable();
            $table->string('kecepatan')->nullable();
            $table->string('deskripsi')->nullable();
            $table->integer('masa_aktif')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
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
        Schema::dropIfExists('layanan_internets');
    }
};
