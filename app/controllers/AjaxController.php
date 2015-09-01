<?php

namespace App\Controllers;

use View, Response, Input, Mail, Validator, Session, Config, Request;
use Swift_RfcComplianceException;

class AjaxController extends \Controller
{
    private $isAjax = true;

    public function __construct()
    {
        if (!Request::ajax()) {
            $this->isAjax = false;
        }
    }

    private function getRedirectIfNotAjax()
    {
        $response = array(
            'status' => 'error',
            'msg' => 'Invalid request',
        );
        return Response::json($response);
    }

    public function sendContactEmail()
    {
        if (!$this->isAjax) {
            return $this->getRedirectIfNotAjax();
        }

        if (Session::token() !== Input::get('_token')) {
            return Response::json(array(
                'msg' => 'Unauthorized attempt to send message'
            ));
        }

        $validator = Validator::make(Input::all(),
            array(
                'private_business' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'content' => 'required|min:20'
            )
        );

        if ($validator->fails()) {
            // The given data did not pass validation
            $response = array(
                'status' => 'error',
                'msg' => $validator->messages(),
            );
            return Response::json($response);
        }

        $data = Input::all();
        // @todo - wywalic z configa moje konto gmail
        $email = array();
        $email[] = $this->getEmailFromRadio(Input::get('private_business'));
        if (Input::get("send_copy"))
            $email[] = Input::get("email");

        try{
            Mail::send('emails.contactform', $data, function ($message) use ($email) {
                $message->to($email, 'NOVOL')->subject('Wiadomość z formularza kontaktowego');
            });
        }catch(Swift_RfcComplianceException $e){
            $response = array(
                'status' => 'error',
                'msg' => array('email' => array(trans('messages.errors_ajaxc_invalid_email_addres'))),
            );
            return Response::json($response);
        }

        $response = array(
            'status' => 'success',
            'msg' => trans('messages.message_ajaxc_email_send'),
        );
        return Response::json($response);
    }

    /**
     *
     */
    private function getEmailFromRadio($radio)
    {
        return Config::get('emails.' . $radio);
    }
}