<?php

namespace App\Controllers\Admin;

use View, Input, Sentry, Redirect;

class DashboardController extends AdminController
{


    public function getView()
    {
        return View::make('theme::dashboard.index');
    }

}
