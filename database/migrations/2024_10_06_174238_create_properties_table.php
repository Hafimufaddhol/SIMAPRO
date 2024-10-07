<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id('id_properti');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('nama_properti', 100);
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->string('tipe_properti', 50);
            $table->string('alamat', 255);
            $table->boolean('status_ketersediaan')->default(1);
            $table->string('foto', 255)->nullable();
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
        Schema::dropIfExists('properties');
    }
}
