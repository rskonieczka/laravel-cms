<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('galleries', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->string('title', 150);
            $table->string('key', 20);
            $table->integer('category_id');
            $table->timestamps();
        });

        Schema::create('galleries_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id');
            $table->integer('media_id');
            $table->integer('weight');
            $table->integer('link');
            $table->string('title');
            $table->text('content');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('galleries');
        Schema::drop('galleries_media');
	}

}
