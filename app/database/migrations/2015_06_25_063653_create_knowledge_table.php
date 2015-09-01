<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowledgeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('knowledge', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('content');
            $table->text('causes');
            $table->text('prevention');
            $table->text('repair');
            $table->text('movie');
            $table->integer('category_id');
            $table->timestamps();
            $table->engine = 'MyISAM';
        });

        Schema::create('knowledge_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('knowledge_id');
            $table->integer('media_id');
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
        Schema::drop('knowledge');
        Schema::drop('knowledge_media');
	}

}
