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
        Schema::create("site_contents", function (Blueprint $table) {
            $table->id();
            $table->string('company_history', 7000);
            $table->string('what_we_do', 7000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //drop
        Schema::dropIfExists('site_contents');
    }
};
