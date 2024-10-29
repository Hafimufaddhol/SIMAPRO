<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payment');
            $table->foreignId('id_transaksi')->constrained('transactions')->onDelete('cascade'); // Foreign key ke tabel transactions
            $table->string('metode_pembayaran', 50); // Kartu Kredit, Transfer Bank, dll
            $table->timestamp('tanggal_pembayaran');
            $table->decimal('jumlah', 10, 2);
            $table->string('status_pembayaran', 50); // Lunas/Belum Lunas
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
        Schema::dropIfExists('payments');
    }
}
