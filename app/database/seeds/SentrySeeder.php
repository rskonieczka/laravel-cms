<?php

use App\Models\User;

class SentrySeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Sentry::getUserProvider()->create(array(
            'email'       => 'admin',
            'password'    => "admin00",
            'first_name'  => 'super',
            'last_name'   => 'admin',
            'activated'   => 1,
        ));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Superadmin',
            'permissions' => array('admin' => 1, 'backend' => 1),
        ));

        // Assign user permissions
        $adminUser  = Sentry::getUserProvider()->findByLogin('admin');
        $adminGroup = Sentry::getGroupProvider()->findByName('Superadmin');
        $adminUser->addGroup($adminGroup);
    }

}