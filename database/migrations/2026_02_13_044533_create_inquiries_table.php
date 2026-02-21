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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->foreignId('lead_id')->constrained('leads')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('product_id')->constrained('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->enum('status', ['NEW', 'OPEN', 'IN_PROGRESS', 'CLOSED', 'APPROVED'])
            ->default('NEW');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
