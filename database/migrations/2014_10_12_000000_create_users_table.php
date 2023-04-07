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
        Schema::create('users', function (Blueprint $table) {
            // ID
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');

            // User Info
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();

            // Profile
            $table->string('profile_image')->nullable();
            $table->string('profile_cover')->nullable();
            $table->string('profile_bio')->nullable();

            // Social
            $table->string('social_instagram')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_youtube')->nullable();
            $table->string('social_discord')->nullable();
            $table->string('social_github')->nullable();
            $table->string('social_twitch')->nullable();
            $table->string('social_medium')->nullable();

            // Settings
            $table->rememberToken();

            // LOG
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
