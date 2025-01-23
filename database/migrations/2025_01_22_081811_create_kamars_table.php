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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id('no_kamar');
            // $table->string('owner')->nullable(true);
            $table->foreignId('owner_id')->nullable(true)->constrained(
                table: 'users',
                indexName: 'kamar_owner_id'
            );
            $table->integer('lantai');
            $table->boolean('terisi')->default(false);
            $table->timestamp('started_at')->nullable(true);
            $table->timestamp('ended_at')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
