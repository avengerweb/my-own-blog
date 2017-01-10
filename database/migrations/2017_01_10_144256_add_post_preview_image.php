<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostPreviewImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('ALTER TABLE posts 
                               MODIFY created_at TIMESTAMP NULL DEFAULT NULL,
                               MODIFY updated_at TIMESTAMP NULL DEFAULT NULL');

        Schema::table('posts', function (Blueprint $table)
        {
            $table->string('cover')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table)
        {
            $table->dropColumn('cover');
        });
    }
}
