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
        Schema::create('projects', function (Blueprint $table) {
            // ID
            $table->id();

            // Post Info
            $table->string('title');
            $table->string('excerpt');
            $table->text('content');
            $table->string('cover_image_path');
            $tavle->string('slug')-unique();

            // Meta
            $table->json('meta_data')->nullable();
            $table->boolean('is_archived')->default(false);
            $table->boolean('is_published')->default(false);

            // Relations
            $table->integer('views')->default(0);   
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('project_categories')->onDelete('cascade');

            // LOG
            $table->timestamps('is_published_at');
            $table->timestamps('is_archived_at');
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
        Schema::dropIfExists('projects');
    }
};
