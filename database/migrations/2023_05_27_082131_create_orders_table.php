<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice', 200);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('cart_id')->nullable()->constrained();
            $table->string('status')->nullable();
            $table->date('tanggal');
            $table->string('provinsi', 200);
            $table->string('kota', 200);
            $table->string('alamat', 200);
            $table->string('kode_pos', 200);
            $table->integer('cek');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
