<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeParentidNullableOnPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('parentId')
                  ->nullable()
                  ->default(null)
                  ->change();
        });
    }
    
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('parentId')
                  ->nullable(false)
                  ->default(0)
                  ->change();
        });
    }
}    

