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
        Schema::create('chi_tiet_nguyen_lieus', function (Blueprint $table) {
            $table->id();
            $table->integer('mamonan');
            $table->integer('manguyenlieu');
            $table->integer('soluong');
            $table->string('donvitinh', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_nguyen_lieus');
    }
};
