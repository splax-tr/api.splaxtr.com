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
        Schema::create('project_comments', function (Blueprint $table) {
            // ID
            $table->id();

            // Comment Info
            $table->string('comment');

            // Meta
            $table->boolean('is_approved')->default(false);

            // Relations
            $table->foreignId('parent_id')->constrained('project_comments')->onDelete('cascade');
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

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
        Schema::dropIfExists('project_comments');
    }
};
