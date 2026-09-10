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
        Schema::create('lich_su_tim_kiems', function (Blueprint $table) {
            $table->id();
            $table->integer('manguoidung');
            $table->string('tukhoatimkiem', 100);
            $table->time('thoigiantimkiem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_su_tim_kiems');
    }
};
