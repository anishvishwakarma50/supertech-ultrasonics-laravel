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
            $table->text('about_company')->nullable();
            $table->string('contact_details')->nullable();
            $table->string('contact_number_2')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('logo')->nullable();
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
