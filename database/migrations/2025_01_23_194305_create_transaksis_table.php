<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained(
                table: 'users',
                indexName: 'kamar_owner_id'
            );
            $table->string('image');
            $table->integer('no_kamar');
            $table->integer('durasi');
            $table->enum('jenis', ['sewa', 'perpanjangan'])->default('sewa');
            $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
