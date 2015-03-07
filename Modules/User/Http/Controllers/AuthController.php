<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Redirect, Input, Sentry;


class AuthController extends AdminController
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getIndex()
    {
        return Redirect::route('user::auth.login');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return View::make('user::auth.login');
    }

    public function getActivate($email, $activationCode){
        try
        {
            // Find the user using the user id
            $user = Sentry::findUserByLogin($email);

            // Attempt to activate the user
            if ($user->attemptActivation($activationCode))
            {
                return Redirect::to('user/account');
            }
            else
            {
                echo 'Wrong data or expired';
            }
        }
        catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
        catch (\Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
        {
            echo 'User is already activated.';
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin()
    {
        try {
            $credentials = array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
            );
            if (Input::get('remember'))
                Sentry::authenticateAndRemember($credentials);
            else
                Sentry::authenticate($credentials, false);

            return Redirect::route('admin.dashboard.view');

            } catch (\Exception $e) {
            return Redirect::route('auth.login')->withErrors(array('login' => $e->getMessage()));
        }
    }

    public function getLogout()
    {
        Sentry::logout();
        return Redirect::route('auth.login');
    }


}
