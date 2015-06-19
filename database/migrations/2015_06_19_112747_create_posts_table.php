<?php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string("title")->unique();
            $table->string("slug")->unique();

            $table->text("description");
            $table->longText("content");

            $table->integer("views", false, true)->default(0);
            $table->integer("like", false, true)->default(0);

            // Author
            $table->integer("user_id", false, true);

            // 0 - disabled | 1 - enabled | 2 - show after date
            $table->tinyInteger("state")->default(1);
            $table->timestamp("active_from")->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->boolean("disable_comments")->default(false);

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
        Schema::drop('posts');
    }
}
