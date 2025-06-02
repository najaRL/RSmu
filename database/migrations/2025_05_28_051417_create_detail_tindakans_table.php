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
        Schema::create('Detail_Tindakans', function (Blueprint $table) {
            $table->id();
            $table->integer('kunjungan_id');
            $table->integer('tindakan_id');
            $table->text('keterangan');
            $table->decimal('keterangan_subtotal',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Detail_Tindakans');
    }
};
