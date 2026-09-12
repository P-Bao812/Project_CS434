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
        Schema::create('nguyen_lieu_nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->integer('manguoidung');
            $table->integer('manguyenlieu');
            $table->integer('soluong');
            $table->string('donvi', 50);
            $table->date('ngaycapnhat');
            $table->string('ghichu', 100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguyen_lieu_nguoi_dungs');
    }
};
