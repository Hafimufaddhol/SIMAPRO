<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_review');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); // Foreign key ke tabel users
            $table->foreignId('id_properti')->constrained('properties')->onDelete('cascade'); // Foreign key ke tabel properties
            $table->integer('rating')->unsigned();
            $table->text('komentar');
            $table->timestamp('tanggal_review');
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
        Schema::dropIfExists('reviews');
    }
}
