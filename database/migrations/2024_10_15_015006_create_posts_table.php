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
            $table->id(); // Primary key
            $table->text('text'); // Text content of the post
            $table->string('desc')->nullable(); 
            $table->string('tags')->nullable(); 
            $table->string('links')->nullable(); 
            $table->foreignId('user_id')->constrained('users')->nullable()->onDelete('cascade'); // Foreign key to users table
            $table->string('media')->nullable(); // Post image, nullable if no image is uploaded
            $table->timestamps(); 
            $table->softDeletes(); 
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
