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
        Schema::create('taikhoans', function (Blueprint $table) {
            $table->id();
            $table->string('emaildangnhap', 255)->unique();
            $table->integer('manguoidung');
            $table->string('password');
            $table->integer('trangthai')->default(0)->comment('0:Hoạt động, 1:Khóa');
            $table->dateTime('lannhapcuoi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taikhoans');
    }
};
