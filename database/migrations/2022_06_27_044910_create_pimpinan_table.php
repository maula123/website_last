<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePimpinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pimpinan', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable(); 
            $table->string('nama')->nullable(); 
            $table->string('nip')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('status_kepegawaian')->nullable();
            $table->text('ttl')->nullable();  
            $table->string('jabatan')->nullable(); 
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
        Schema::dropIfExists('pimpinan');
    }
}
