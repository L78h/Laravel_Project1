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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('postId')->nullable();
            $table->foreign('postId')->references('id')->on('posts');
            
            $table->bigInteger('parentid')->nullable();
            $table->string('title', 100);
            $table->tinyInteger('published');
            $table->dateTime('createdAt');
            $table->dateTime('publishedAt')->nullable();
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
