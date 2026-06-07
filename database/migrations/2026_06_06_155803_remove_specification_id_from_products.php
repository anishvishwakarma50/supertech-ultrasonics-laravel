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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['specification_id']);

            $table->dropColumn([
                'specification_id',
                'moq'    
            ]);
        });


        Schema::dropIfExists('specification');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->string('moq')->nullable();
            $table->foreignId('specification_id')
                  ->nullable()
                  ->constrained('specification')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }
};
