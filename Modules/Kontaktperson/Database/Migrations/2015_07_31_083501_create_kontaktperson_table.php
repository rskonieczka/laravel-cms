<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontaktpersonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kontaktperson', function(Blueprint $table)
		{
            $table->increments('id');
		    $table->string('name');
            $table->text('title');
            $table->string('email');
            $table->string('phone');
            $table->string('section');
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
		Schema::drop('kontaktperson');
	}

}
