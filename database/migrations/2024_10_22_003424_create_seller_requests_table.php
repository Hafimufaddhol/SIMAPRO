<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_requests', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); // Foreign key ke tabel users
            $table->timestamp('tanggal_pengajuan');
            $table->string('status_pengajuan', 50)->default('Pending'); // Pending/Approved/Rejected
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
        Schema::dropIfExists('seller_requests');
    }
}
