<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); // Foreign key ke tabel users
            $table->foreignId('id_properti')->constrained('properties')->onDelete('cascade'); // Foreign key ke tabel properties
            $table->string('tipe_transaksi', 50); // Beli/Sewa
            $table->timestamp('tanggal_transaksi');
            $table->decimal('jumlah', 10, 2);
            $table->string('status_transaksi', 50); // Lunas/Belum Lunas
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
        Schema::dropIfExists('transactions');
    }
}
