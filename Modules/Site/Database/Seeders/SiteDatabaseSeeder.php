<?php namespace Modules\site\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\Site\Entities\Site;

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
        Site::create(array('name' => 'default', 'domain' => Request::root(), 'theme' => 'default'));
	}

}