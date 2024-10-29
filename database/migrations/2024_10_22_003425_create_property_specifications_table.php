<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertySpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_specifications', function (Blueprint $table) {
            $table->id('id_specification');
            $table->foreignId('id_properti')->constrained('properties')->onDelete('cascade'); // Foreign key ke tabel properties
            $table->decimal('luas', 5, 2); // Luas properti dalam meter persegi
            $table->integer('jumlah_kamar');
            $table->integer('jumlah_ruangan');
            $table->integer('jumlah_kamar_mandi');
            $table->integer('jumlah_lantai');
            $table->text('fasilitas');
            $table->string('tipe_fasilitas', 100);
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
        Schema::dropIfExists('property_specifications');
    }
}
