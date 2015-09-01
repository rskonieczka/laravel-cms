<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id');
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->string('template_file', 100);
            $table->integer('parent');
            $table->integer('weight');
            $table->integer('hide');
            $table->enum('device', array('all', 'desktop', 'mobile'));
            $table->string('lang', 20);
            $table->timestamps();
        });

        Schema::create('categories_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }

}
