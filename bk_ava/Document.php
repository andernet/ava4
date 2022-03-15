<?php

namespace App\Controllers;

use App\Controllers\BaseController;
//use App\Models\UserModel;

class Document extends BaseController
{
    public function index()
    {
        //form database
        //variable
        $to='andernet@gmail.com';
        $subject='Email Test sadfasdf';
        $message='Testing the email class.';
        $filepath1='email.png';
        $filepath2='certificado.pdf';

        $email = \Config\Services::email();

        $email->setFrom('certificadoemailteste@gmail.com', 'certificadoemailteste');
        $email->setTo($to);
        // $email->setCC('another@another-example.com');
        // $email->setBCC('them@their-example.com');

        $email->setSubject($subject);
        $email->setMessage($message);
        $email->attach($filepath1);
        $email->attach($filepath2);

        if ($email->send()){
            echo 'Enviado';
        } else{
            echo 'Erro';
        }
    }
    
    



}