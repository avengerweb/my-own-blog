<?php

use App\Entity\Blog\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string("title");
            $table->string("slug")->unique();

            $table->unsignedInteger("views")->default(0);
            $table->unsignedInteger("likes")->default(0);

            $table->longText("content");
            $table->unsignedInteger("user_id");

            $table->tinyInteger("status")->default(Post::STATUS_ACTIVE);

            $table->timestamps();
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
