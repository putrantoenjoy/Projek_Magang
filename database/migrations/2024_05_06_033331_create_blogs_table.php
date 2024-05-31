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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('penulis')->nullable();
            $table->string('judul')->nullable();
            $table->string('deskripsi')->nullable();
            $table->longText('konten')->nullable();
            $table->string('gambar')->nullable();
            // $table->string('tags')->nullable();
            // $table->string('facebook')->nullable();
            // $table->string('instagram')->nullable();
            // $table->string('youtube')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
