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
        Schema::create('blogs_tag', function (Blueprint $table) {
            // Relations
            $table->foreignId('blog_id')->constrained('blogs')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');

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
        Schema::dropIfExists('blogs_tag');
    }
};
