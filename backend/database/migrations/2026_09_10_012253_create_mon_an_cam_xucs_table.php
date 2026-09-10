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
        Schema::create('mon_an_cam_xucs', function (Blueprint $table) {
            $table->id();
            $table->integer('macamxuc');
            $table->integer('mamonan');
            $table->integer('mucdophuhop');
            $table->integer('ghichu', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mon_an_cam_xucs');
    }
};
