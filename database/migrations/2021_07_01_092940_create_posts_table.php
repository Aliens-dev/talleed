<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('id');
            $table->string("title");
            $table->string("slug");
            $table->longText("body");
            $table->text("excerpt");
            $table->string("thumbnail")->default('');
            $table->string("status")->default("pending");
            $table->unsignedBigInteger("author_id");
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign("author_id")->references('id')->on('users')->cascadeOnDelete();
            $table->foreign("category_id")->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
