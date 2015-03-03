<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresscenterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('presscenter', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 100);
			$table->string('file', 200);
			$table->text('content');
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
		Schema::drop('presscenter');
	}

}
