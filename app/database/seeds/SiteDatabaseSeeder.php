<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Site\Entities\Site;
use Modules\Category\Entities\Category;

class SiteDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        DB::table('sites')->delete();
        Site::create(array('name' => 'default', 'domain' => str_replace("http://", "", \Request::root()), 'theme' => 'default'));
        Category::create(array('site_id' => 1, 'name' => "Home", 'slug' => '/', 'template_file' => 'default.welcome', 'weight' => 0, 'device' => 'all', 'lang' => 'pl'));
	}

}