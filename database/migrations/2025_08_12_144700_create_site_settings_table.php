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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 100);
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->text('site_address')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_facebook_url')->nullable();
            $table->string('site_twitter_url')->nullable();
            $table->string('site_linkedin_url')->nullable();
            $table->string('site_instagram_url')->nullable();
            $table->string('site_youtube_url')->nullable();
            $table->text('site_working_hours')->nullable();
            $table->text('site_maps_embed')->nullable();
            $table->string('site_seo_title')->nullable();
            $table->text('site_seo_description')->nullable();
            $table->text('site_seo_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
