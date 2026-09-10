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
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->string('hoten', 100);
            $table->string('tenhienthi', 100);
            $table->string('gioithieungan', 100);
            $table->string('emaillienhe', 100);
            $table->integer('sodienthoi', 13);
            $table->date('ngaysinh');
            $table->string('diachi', 255);
            $table->string('anhdaidien', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dungs');
    }
};
