<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('novol_id');
            $table->string('name', 150);
            $table->text('description');
            $table->text('brief');
            $table->text('icons');
            $table->text('table');
            $table->string('tech_card', 150);
            $table->string('char_card', 150);
            $table->string('voc', 150);
			$table->timestamps();
		});

        Schema::create('products_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->integer('weight');
            $table->string('title', 150);
            $table->text('content');
        });

        Schema::create('products_ghs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('media_id')->unsigned();
            $table->integer('weight');
            $table->string('title', 150);
            $table->timestamps();
        });

        Schema::create('products_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('category_id')->unsigned();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
        Schema::drop('products_media');
        Schema::drop('products_ghs');
        Schema::drop('products_category');
	}

}
