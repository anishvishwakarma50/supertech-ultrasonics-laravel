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
        Schema::create('specification', function (Blueprint $table) {
            $table->id();
            $table->string('usage');
            $table->string('material');
            $table->double('weight');
            $table->double('voltage');
            $table->string('color');
            $table->string('frequency');
            $table->double('temperature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specification');
    }
};
