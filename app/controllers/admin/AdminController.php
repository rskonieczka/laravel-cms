<?php

namespace App\Controllers\Admin;

use Controller, View, Response, Module;

class AdminController extends Controller
{
    private $template = 'admin';

    public function __construct()
    {
        View::addLocation(app('path') . '/themes/' . $this->template);
        View::addNamespace('theme', app('path') . '/themes/' . $this->template);
        View::composer("theme::layout.master", 'AdminComposer');
    }

    public function showError()
    {
        return Response::view('theme::errors.missing', array(), 404);
    }

}
