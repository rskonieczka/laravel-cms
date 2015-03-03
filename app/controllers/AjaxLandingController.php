<?php

namespace App\Controllers;

use Input, Sentry, Request, Validator, Response;

class AjaxLandingController extends \BaseController
{

    public function __construct(){
        if(!Request::ajax())
            die('Bad request - only Ajax accepted');

    }

    public function validateSurveyForm(){
        if(Request::ajax()) {
            $rules = array('email' => 'required|email|unique:users', 'tocheck' => 'required');
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()

                ));
            }
           $this->getTheSurvey(Input::all());
            return Response::json(array(
                'success' => true
            ));
        }
    }

    private function getTheSurvey($postData)
    {

        $groupName = $this->createGroupOrFail($postData['group']);
        $userData = array(
            'email' => $postData['email'],
            'password' => $this->randomPassword(),
            'group' => $groupName
        );
        $activationCode = $this->createUserOrFail($userData);
        $this->sendActivationCode(
            array(
                'email' => $userData['email'],
                'password' => $userData['password'],
                'activationCode' => $activationCode
            )
        );


    }

    private function sendActivationCode($data){
        \Mail::send('emails.auth.activationcode', $data, function($message) use($data)
        {
            $message->to($data['email'], $data['email'])
                ->subject('Welcome to law4growth.com');
        });
    }

    private function createUserOrFail($userData)
    {
        try {
            $user = Sentry::register(array(
                'email' => $userData['email'],
                'password' => $userData['password']
            ));
            $group = Sentry::findGroupByName($userData['group']);
            $user->addGroup($group);

            return $user->getActivationCode();

        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            echo 'Login field is required.';
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            echo 'Password field is required.';
        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            echo 'User with this login already exists.';
        }
    }

    private function createGroupOrFail($groupName)
    {
        try {
            Sentry::findGroupByName($groupName);
            return $groupName;
        } catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            if (empty($groupName))
                return false;

            Sentry::createGroup(array(
                'name' => $groupName,
                'permissions' => array(
                    'admin' => 0,
                    'users' => 1,
                ),
            ));
            return $groupName;

        }

    }

    private function randomPassword($chars = 8)
    {
        $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($letters), 0, $chars);
    }
}