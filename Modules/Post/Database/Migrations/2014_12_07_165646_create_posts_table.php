<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('title', 100);
            $table->string('photo', 200);
            $table->text('content');
            $table->text('tags');
            $table->text('badges');
            $table->text('parameters');
            $table->integer('category_id');
            $table->timestamps();
            $table->engine = 'MyISAM';
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
