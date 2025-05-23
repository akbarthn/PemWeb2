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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('slug',255)->unique();
            $table->text('body');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamp('published_at')->nullable(); 
            $table->timestamps();
        });
    }

/**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
