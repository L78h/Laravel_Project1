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
        $table->timestamps();

        $table->unsignedBigInteger('categoryId');
        $table->foreign('categoryId')->references('id')->on('categories');

        $table->unsignedBigInteger('userId');
        $table->foreign('userId')->references('id')->on('users');

        $table->bigInteger('authorId');
        $table->bigInteger('parentId')->nullable();
        $table->string('title', 75);
        $table->string('metaTitle', 100);
        $table->string('slug', 100);
        $table->text('summary');
        $table->tinyInteger('published');
        $table->dateTime('createdAt', 0);
        $table->dateTime('updatedAt', 0);
        $table->dateTime('publishedAt', 0)->nullable();
        $table->text('content');
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
