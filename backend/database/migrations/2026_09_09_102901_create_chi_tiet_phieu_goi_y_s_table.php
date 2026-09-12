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
        Schema::create('chi_tiet_phieu_goi_y_s', function (Blueprint $table) {
            $table->id();
            $table->integer('mamonan');
            $table->integer('maphieugoiy');
            $table->integer('dophuhop');
            $table->string('lydogoiy');
            $table->integer('thutuhienthi');
            $table->integer('songuyelieucosan');
            $table->integer('tongnguyenlieucan');
            $table->integer('tylephuhop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phieu_goi_y_s');
    }
};
