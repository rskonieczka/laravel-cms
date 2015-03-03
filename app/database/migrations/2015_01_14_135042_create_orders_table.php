<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->increments('id');
			$table->text('content');
			$table->integer('user_id');
			$table->timestamps();
			$table->engine = 'MyISAM';
		});

		Schema::create('orders_products', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id');
			$table->integer('product_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
		Schema::drop('orders_products');
	}

}
