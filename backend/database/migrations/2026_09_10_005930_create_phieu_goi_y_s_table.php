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
        Schema::create('phieu_goi_y_s', function (Blueprint $table) {
            $table->id();
            $table->integer('manguoidung');
            $table->string('noidungnhap', 255);
            $table->time('thoigiangoiy');
            $table->integer('loaigoiy')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_goi_y_s');
    }
};
